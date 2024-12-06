import subprocess
import sys
import requests
import time
import threading
from faker import Faker
from colorama import init, Fore, Back, Style
from pyfiglet import Figlet

# Kiểm tra và cài đặt các thư viện cần thiết
def install(package):
    subprocess.check_call([sys.executable, "-m", "pip", "install", package])

required_packages = ['requests', 'Faker', 'colorama', 'pyfiglet']

for package in required_packages:
    try:
        __import__(package)
    except ImportError:
        install(package)

init(autoreset=True)
fake = Faker()

def create_account(base_url):
    url = base_url + "/ajaxs/client/register.php"
    username = fake.user_name()
    email = fake.email()
    password = fake.password(length=12)
    data = {
        'username': username,
        'email': email,
        'password': password,
        'repassword': password
    }
    headers = {
        'User-Agent': 'Mozilla/5.0',
        'Content-Type': 'application/x-www-form-urlencoded'
    }
    response = requests.post(url, data=data, headers=headers)
    if response.status_code == 200:
        print(Fore.GREEN + f"Successfully created account for {username}!")
    else:
        print(Fore.RED + f"Error occurred: {response.status_code}")
    print(Fore.CYAN + "Response details:", Fore.YELLOW + f"{response.text}")

def run_spam_clonev6(base_url):
    num_accounts = int(input(Fore.CYAN + "Enter the number of accounts you want to create: "))
    for _ in range(num_accounts):
        create_account(base_url)

def run_cron(url, timeout_duration, interval, stop_event, thread_name):
    while not stop_event.is_set():
        try:
            response = requests.get(url, timeout=timeout_duration)
            if response.status_code == 200:
                print(Fore.GREEN + f"✅ {thread_name} Success: {url} - Status Code: {response.status_code}")
            else:
                print(Fore.RED + f"⚠️ {thread_name} Failed: {url} - Status Code: {response.status_code}")
        except requests.exceptions.Timeout:
            print(Fore.RED + f"⏰ {thread_name} Timeout: {url}")
        except requests.exceptions.RequestException as e:
            print(Fore.RED + f"💥 {thread_name} Error: {url} - {str(e)}")
        time.sleep(interval)

def run_cron_tool():
    while True:
        try:
            num_links = int(input(Fore.CYAN + "📊 Enter the number of cron links: "))
            break
        except ValueError:
            print(Fore.RED + "Invalid input. Please enter a number.")
    
    urls = []
    for i in range(num_links):
        url = input(Fore.CYAN + f"🌐 Enter cron link {i+1}: ")
        urls.append(url)
    
    while True:
        try:
            interval = float(input(Fore.CYAN + "⏱️ Enter the number of seconds between requests: "))
            break
        except ValueError:
            print(Fore.RED + "Invalid input. Please enter a number.")
    
    while True:
        try:
            timeout_duration = float(input(Fore.CYAN + "⏰ Enter the timeout duration for each link: "))
            break
        except ValueError:
            print(Fore.RED + "Invalid input. Please enter a number.")
    
    threads = []
    for i, url in enumerate(urls):
        stop_event = threading.Event()
        thread = threading.Thread(target=run_cron, args=(url, timeout_duration, interval, stop_event, f"Thread {i+1}"))
        thread.start()
        threads.append((thread, stop_event))
    print(Fore.GREEN + "Cron jobs are running. Press Ctrl+C to stop.")
    try:
        while True:
            time.sleep(1)
    except KeyboardInterrupt:
        for thread, stop_event in threads:
            stop_event.set()
            thread.join()
        print(Fore.RED + "Stopped all cron jobs.")

def get_facebook_user_info(uid, access_token):
    url = f"https://graph.facebook.com/{uid}"
    params = {
        'access_token': access_token,
        'fields': 'id,name,about,birthday,gender,location'
    }
    response = requests.get(url, params=params)
    if response.status_code == 200:
        return response.json()
    else:
        print(Fore.RED + f"Error: {response.status_code}")
        print(Fore.YELLOW + f"Details: {response.json()}")
        return None

def run_facebook_tool():
    access_token = input(Fore.CYAN + "Enter your access token: ")
    user_uid = input(Fore.CYAN + "Enter the Facebook user's UID: ")
    user_info = get_facebook_user_info(user_uid, access_token)
    if user_info:
        print(Fore.GREEN + "User Info:")
        print(f"ID: {user_info.get('id')}")
        print(f"Name: {user_info.get('name')}")
        print(f"About: {user_info.get('about', 'N/A')}")
        print(f"Birthday: {user_info.get('birthday', 'N/A')}")
        print(f"Gender: {user_info.get('gender', 'N/A')}")
        print(f"Location: {user_info.get('location', 'N/A')}")

def check_key(api_url, key):
    try:
        response = requests.get(api_url, params={'key': key}, timeout=30)
        response.raise_for_status()
        data = response.json()
        return data.get('valid', False)
    except requests.exceptions.RequestException as e:
        print(Fore.RED + f"Error checking key: {str(e)}")
        return False

def main():
    print(Fore.MAGENTA + Figlet(font='slant').renderText('dichvulight'))
    api_url = 'https://dichvulight.vn/key.php'
    key = input(Fore.CYAN + "Enter your key to activate the tool: ")
    if not check_key(api_url, key):
        print(Fore.RED + "Invalid key. Please try again.")
        return
    print(Fore.GREEN + "Valid key! Activation successful.")
    while True:
        print(Fore.CYAN + "Choose a function:")
        print(Fore.CYAN + "1. Run Cron Tool")
        print(Fore.CYAN + "2. Fetch Facebook User Info")
        print(Fore.CYAN + "3. Spam Clonev6 Members")
        print(Fore.CYAN + "4. Exit")
        choice = input(Fore.CYAN + "Enter your choice (1/2/3/4): ").strip()
        if choice == '1':
            run_cron_tool()
        elif choice == '2':
            run_facebook_tool()
        elif choice == '3':
            url = input(Fore.CYAN + "Enter the URL of the website where you want to increase members: ")
            run_spam_clonev6(url)
        elif choice == '4':
            print(Fore.YELLOW + "Goodbye!")
            break
        else:
            print(Fore.RED + "Invalid choice. Please try again.")

if __name__ == "__main__":
    main()
