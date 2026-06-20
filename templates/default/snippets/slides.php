<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/*
Слайдеры контента
-----------------

<?php snippet('slides', 'start') ?>

div(animation-fade)
    free content slide 1
/div

div(animation-fade)
    free content slide 2
/div

div(animation-fade)
    free content slide 3
/div

<?php snippet('slides', 'end') ?>

---

Можно указать дополнительные css-классы

<?php snippet('slides', 'start', 'bordered bg-primary100 pad10') ?>

<?php snippet('slides', 'end', 'bg-primary300 pad10 rounded10') ?>

*/

$sliderStartCSS = ($DATA === 'start') ? $DATA1 : '';
$sliderEndCSS = ($DATA === 'end') ? $DATA1 : '';

$sliderStart = strRemoveLF(<<<TXT
<!-- nosimple -->
<div x-data="{
    active: 0, 
    total: 0, 
    init() {this.total = this.\$refs.track.children.length; this.render(); }, 
    render() {Array.from(this.\$refs.track.children).forEach((el, i) => {
            el.style.display = (i === this.active) ? 'block' : 'none'; 
        });},
    next() { this.active = (this.active + 1) % this.total; this.render(); },
    prev() { this.active = (this.active - 1 + this.total) % this.total; this.render(); } }" 
    @keydown.window.right="next()"
    @keydown.window.left="prev()"
    class="pos-relative {$sliderStartCSS}" x-cloak>
    
    <div x-ref="track" class="slider-track bor-solid-b bor1 bor-primary200 overflow-hidden h400px-min" x-cloak>
<!-- /nosimple -->
TXT);

$sliderEnd = strRemoveLF(<<<TXT
<!-- nosimple -->
    </div>

    <div class="t-center" x-cloak>
        <template x-for="i in total"><span @click="active = i-1; render()" class="cursor-pointer t200" :class="active === i-1 ? 't-primary600' : 't-gray300'">•</span></template>
    </div>
        
    <div class="flex flex-vcenter gap10 mar10-t {$sliderEndCSS}" x-cloak>
        <button @click="prev()" class="button">←</button>
        <div><span x-text="active + 1"></span> / <span x-text="total"></span></div>
        <button @click="next()" class="button">→</button>
    </div>
</div>
<!-- /nosimple -->
TXT);

if ($DATA === 'start') echo $sliderStart;
elseif ($DATA === 'end') echo $sliderEnd;

# end of file
