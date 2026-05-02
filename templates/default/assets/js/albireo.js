/* (c) Albireo CMS, https://maxsite.org/albireo, 2020 */

/* form invalid */
if (document.addEventListener) {
    document.addEventListener('invalid', function (e) {
        e.target.classList.add("js-form-invalid");
    }, true);
}

/* <button class="button" onclick="this.animate('animation-bounce')">Click Me</button> */
HTMLElement.prototype.animate = function (animation) {
    let _self = this;
    animation = ' ' + animation;
    _self.className += animation;
    _self.addEventListener('animationend', function () {
        _self.className = _self.className.replace(animation, '');
    });
}

function albireoForm() {
    return {
        result: '',
        hasErrors: false,

        submitForm(actionUrl) {
            const formEl = this.$refs.form;

            fetch(actionUrl, {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: new FormData(formEl),
                redirect: 'follow'
            })
            .then(r => {
                if (r.redirected) {
                    window.location.href = r.url;
                } else {
                    return r.text();
                }
            })
            .then(r => {
                if (!r) return;
                this.result = r;
                this.hasErrors = r.includes('error-form');

                const container = document.createElement('div');
                container.innerHTML = r;
                this.$refs.result.innerHTML = container.innerHTML;

                container.querySelectorAll('script').forEach(script => {
                    const newScript = document.createElement('script');
                    if (script.src) {
                        newScript.src = script.src;
                    } else {
                        newScript.textContent = script.textContent;
                    }
                    document.body.appendChild(newScript);
                });
            });
        },
    };
}

document.addEventListener('alpine:init', () => {
    const baseSend = async (el, actionUrl, data = {}, type = 'json') => {
        let formData = data instanceof HTMLFormElement ? new FormData(data) : new FormData();
        if (!(data instanceof HTMLFormElement)) {
            Object.keys(data).forEach(key => formData.append(key, data[key]));
        }

        formData.append('ajax_return_type', type);

        try {
            console.log('--- AJAX SEND ---');
            console.table(Object.fromEntries(formData));

            const response = await fetch(actionUrl, {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: formData,
                redirect: 'follow'
            });

            const serverHeader = response.headers.get('X-Result');

            if (response.redirected) {
                window.location.href = response.url;
                return;
            }

            const result = type === 'json' ? await response.json() : await response.text();

            console.log('--- AJAX RECEIVE ---');
            console.log(result);
            console.log('--------------------');

            if (serverHeader) {
                let eventName, eventDetail;

                try {
                    const parsed = JSON.parse(serverHeader);
                    eventName = parsed.event || 'ajax_success';
                    eventDetail = parsed;
                } catch (e) {
                    eventName = serverHeader;
                    eventDetail = {};
                }

                eventDetail.response = result;
                eventDetail.status = response.status;

                el.dispatchEvent(new CustomEvent(eventName, {
                    detail: eventDetail,
                    bubbles: true
                }));
            }

            return result;
        } catch (error) {
            console.error('AJAX Error:', error);
        }
    };

    Alpine.magic('sendDataJson', (el) => (url, data) => baseSend(el, url, data, 'json'));
    Alpine.magic('sendDataHtml', (el) => (url, data) => baseSend(el, url, data, 'html'));
});

document.addEventListener('alpine:init', () => {
    Alpine.data('livePaginationHandler', (config) => ({
        page: config.initialPage,
        showButton: config.initialShow,
        baseUrl: config.urlFull,
        before: config.before || '',
        after: config.after || '',
        isLoading: false,

        async loadMore(handlerUrl) {
            this.isLoading = true;
            this.page++;

            try {
                const res = await this.$sendDataJson(handlerUrl, {
                    current: this.page,
                    urlFull: this.baseUrl
                });

                if (res) {
                    const wrappedContent = `${this.before}${res.items}${this.after}`;
                    this.$refs.items.insertAdjacentHTML('beforeend', wrappedContent);
                    this.$refs.pagination.innerHTML = res.pagination;
                    this.$refs.pagination.innerHTML = res.pagination;
                    const url = new URL(this.baseUrl);
                    url.searchParams.set('page', this.page);
                    window.history.pushState({}, '', url.toString());
                }
            } catch (e) {
                console.error("Pagination error:", e);
            } finally {
                this.isLoading = false;
            }
        }
    }));
});

document.addEventListener('alpine:init', () => {
    const CART_KEY = window.CART_KEY || 'cart_items';
    const HISTORY_KEY = window.HISTORY_KEY || 'orders_history';
    
    Alpine.store('cart', {
        items: JSON.parse(localStorage.getItem(CART_KEY) || '{}'),
        history: JSON.parse(localStorage.getItem(HISTORY_KEY) || '[]'),
        message: '',

        save() {
            localStorage.setItem(CART_KEY, JSON.stringify(this.items));
        },

        add(product) {
            if (this.items[product.id]) {
                this.items[product.id].qty = Math.min(
                    this.items[product.id].qty + 1, 
                    product.max_qty
                );
            } else {
                this.items[product.id] = { ...product, qty: 1, added_at: Date.now() };
            }
            this.save();
        },

        remove(id) {
            delete this.items[id];
            this.save();
        },

        get totalCount() {
            return Object.values(this.items).reduce((sum, item) => sum + item.qty, 0);
        },

        get totalPrice() {
            return Object.values(this.items).reduce((sum, item) => sum + (item.price * item.qty), 0);
        },
        
        get isEmpty() {
            return Object.keys(this.items).length === 0;
        },
        
        getOrder() {
            const itemsSnapshot = JSON.parse(JSON.stringify(this.items));
            const order = {
                id: new Date().toISOString().replace(/[-T:.Z]/g, '').slice(0, 14),
                date: new Date().toLocaleString(),
                items: itemsSnapshot,
                total: this.totalPrice
            };

            return order;
        },
        
        checkout(successMessage = 'Order sent successfully!') {
            order = this.getOrder();
            this.history.unshift(order);
            if (this.history.length > 10) this.history.pop();
            localStorage.setItem(HISTORY_KEY, JSON.stringify(this.history));

            this.items = {};
            this.save();
            
            this.message = successMessage;
        }
    });
});
