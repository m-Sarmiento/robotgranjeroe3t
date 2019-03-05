##Este archivo funciona como esquema para guardar datos en la base de datos a traves de POST
##Basado en este archivo debe crearse una rutina en la rasperri
##															TO DO: rutina en la rasperri (comunicaciones), se debe procesar la informacion antes de enviarla al servidor

import requests	#http para humanos
import time
import random
import datetime


ip='robotgranjeroe3t.ueuo.com'	
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
		##t tiempo formato texto '%Y-%m-%d %H:%M:%S'
		#ph valor del ph double
		#humidity valor humedad double
		#temp valor de la temperatura double
		#img ruta de la imagen texto '/img%n.jpg'			TO DO: servidor FTP en rasperi para enviar las imagenes (comunicaciones)
		#plant numero de la planta en la parcela int 		TO DO: actualizar base de datos con los nuevos requisitos
r = requests.post('http://'+ip+'/prueva/iot.php',data = {'t':st,'ph':round(x,2),'humidity':round(x2,2),'temp':round(x/2 - x2,2),'img':'/img'+str(i)+'.jpg','plant':p})
print(r.status_code, r.reason)	#revisa el estado de la transmision
time.sleep(1) #espera 1 segundo
