'''import requests'''
'''ip='robotgranjeroe3t.ueuo.com'
##ip='192.168.1.60/robotgranjeroe3t'
url = 'http://'+ip+'/web/php/image.php' 
files = {'media': open('1.jpg', 'rb')}## nombre de l imagen
r=requests.post(url, files=files)
print(r.text)'''

import ftplib
session = ftplib.FTP('robotgranjeroe3t.ueuo.com','robotgranjeroe3t.ueuo.com','123qweasd')
session.cwd('/web/uploads')
file = open('1.jpg','rb')                  # file to send
session.storbinary('STOR 1.jpg', file)     # send the file
file.close()                                    # close file and FTP
session.quit()

