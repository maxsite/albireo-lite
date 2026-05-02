# pip install requests

import requests
import os
from datetime import datetime

# Конфигурация плагинов
PLUGINS_CONFIG = {
    'sort': False,
    'morph': True,
    'anchor': True,
    'collapse': True,
    'focus': False,
    'persist': True,
    'resize': True,
    'intersect': True,
    'mask': True
}

def get_latest_version():
    # Запрашиваем данные о пакете из реестра NPM
    npm_url = "https://registry.npmjs.org/alpinejs/latest"
    try:
        response = requests.get(npm_url, timeout=5)
        if response.status_code == 200:
            # Получаем точную версию, например "3.14.5"
            return response.json()['version']
    except Exception as e:
        print(f"Error fetching version: {e}")
    
    return "3.14.5" # Запасной вариант, если API недоступно

def log_version(version):
    now = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    # Читаем существующий лог, чтобы не дублировать ту же версию подряд
    last_version = ""
    if os.path.exists("version.txt"):
        with open("version.txt", "r", encoding="utf-8") as f:
            lines = f.readlines()
            if lines:
                last_line = lines[-1]
                if "version: " in last_line:
                    last_version = last_line.split("version: ")[1].strip()

    # Записываем только если версия изменилась (чтобы не спамить в лог)
    if version != last_version:
        with open("version.txt", "a", encoding="utf-8") as f:
            f.write(f"[{now}] Updated to version: {version}\n")
        print(f"✅ New version logged: {version}")
    else:
        print(f"ℹ️ Version {version} is already in the log.")

def build():
    version = get_latest_version()
    print(f"🚀 Real Alpine.js version: {version}")
    
    log_version(version)
    
    BASE_URL = "https://cdn.jsdelivr.net/npm/@alpinejs"
    CORE_URL = f"https://cdn.jsdelivr.net/npm/alpinejs@{version}/dist/cdn.min.js"

    # Создаем папку для плагинов
    PLUGINS_DIR = "plugins"
    if not os.path.exists(PLUGINS_DIR):
        os.makedirs(PLUGINS_DIR)

    all_plugins_for_bundle = []
    
    # 1. Скачиваем ядро
    core_r = requests.get(CORE_URL)
    if core_r.status_code == 200:
        with open("alpine.min.js", "w", encoding="utf-8") as f:
            f.write(core_r.text)
        core_code = core_r.text
    else:
        print(f"Failed to download core version {version}")
        return

    # 2. Скачиваем плагины
    for plugin, include_in_bundle in PLUGINS_CONFIG.items():
        url = f"{BASE_URL}/{plugin}@{version}/dist/cdn.min.js"
        r = requests.get(url)
        
        if r.status_code == 200:
            p_code = r.text
            with open(f"{PLUGINS_DIR}/{plugin}.min.js", "w", encoding="utf-8") as f:
                f.write(p_code)
            
            if include_in_bundle:
                all_plugins_for_bundle.append(p_code + ";")
            print(f"  + {plugin} ({version})")
        else:
            print(f"  - {plugin} NOT FOUND for version {version}")

    # 3. Сборка бандла
    full_code = "\n".join(all_plugins_for_bundle) + "\n" + core_code
    with open("alpine-plugins.min.js", "w", encoding="utf-8") as f:
        f.write(full_code)
    
    print(f"\n✨ Ready! Alpine.js {version} is fully assembled.")

if __name__ == "__main__":
    build()
    