##Este archivo funciona como esquema para guardar datos en la base de datos a traves de POST
##Basado en este archivo debe crearse una rutina en la rasperri
##															TO DO: rutina en la rasperri (comunicaciones), se debe procesar la informacion antes de enviarla al servidor

import requests	#http para humanos
import time
import random
import datetime


##ip='robotgranjeroe3t.ueuo.com'
ip='10.14.52.135'
# Valores aleatorios para llenar la base de datos, solo para pruebas
i=1
x=random.uniform(1,255)
x2=random.uniform(1,255)
y=random.randint(1,10)
ts=time.time()
st = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')	#convierte el tiempo es un valor legible para humanos y con el formato de la base de datos
p = 1 ## numero de la planta
print(str(ts))
	##convencion
		##time tiempo formato texto '%Y-%m-%d %H:%M:%S'
		#temp valor del temp float
                #temp_amb valor del temp float
		#humidity valor humedad float
                #humidity_amb valor humedad ambiente float
		#grow valor de la cresimiento int
                #mellowing valor de la maduracion int                                 			
		#plant numero de la planta en la parcela int
                #img nombre d ela imagen de la imagen texto 'tom1.jpg'
r = requests.post('http://'+ip+'/robotgranjeroe3t/web/php/iot.php',data = {'time':st,'temp':round(x,2),'temp_amb':round(x,2),'humidity':round(x,2),'humidity_amb':round(x2,2),'grow':round(x/2 - x2,2),'mellowing':round(x/2 - x2,2),'photo':str(i)+'.jpg','plant':p})
print(r.status_code, r.reason)	#revisa el estado de la transmision
time.sleep(1) #espera 1 segundo
