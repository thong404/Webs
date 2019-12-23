import os
import threading
import urllib3
import time

node1 = [1,2,4,5]
def sendDataToServer():
	threading.Timer(2,sendDataToServer).start()
	print("Sensing...")
	http = urllib3.PoolManager()
	http.request('GET',"http://localhost/add_data.php?temp="+str(node1[0])+"&humi="+str(node1[1])+"&shumi="+str(node1[2])+"&lux="+str(node1[3])).read()	
sendDataToServer()