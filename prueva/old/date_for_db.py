import requests
import time
import random


ip='10.14.33.23'

for i in range(1,10):
	x=random.uniform(1,255)
	x=round(x,3)
	r = requests.get('http://'+ip+'/prueva/iot.php?valor='+str(x))
	r.status_code
	time.sleep(10)
