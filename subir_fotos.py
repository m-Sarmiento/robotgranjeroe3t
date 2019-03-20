import requests
url = 'http://192.168.1.60/robotgranjeroe3t/web/php/image.php' ##esto se debe cambiar
files = {'media': open('tom1.jpg', 'rb')}## nombre de l imagen
r=requests.post(url, files=files)
print(r.text)