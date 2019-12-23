import time
import serial
import RPi.GPIO as GPIO
import threading
import urllib3
import mysql.connector

GPIO.setmode(GPIO.BCM)
GPIO.setup(2, GPIO.OUT)  #Quat Suoi
GPIO.setup(3, GPIO.OUT)  #Bom Nuoc
GPIO.setup(4, GPIO.OUT)  #Den sang
GPIO.setup(17, GPIO.OUT) #chua thiet lap

#Khai bao cac chuoi du lieu
s = ""
s1 = ""
s2 = ""
res = ""

#ten node dang xet
node = 0

#Khai bao cac bien trong xu ly chuoi
hot = l = nhan = i = bd = k = kt = 0

#khai bao bien luu trang thai cac node on/off
trangthai = [0,0,0,0,0] #chi tinh tu 1 - 5 tuong ung 4node
ttn = [0,0,0,0,0] # Trang thai nhan thiet lap tu cac node
td = [0,0,0,0,0]

#Khai bao bien ghi nhan loi o cac node
loi = [0,0,0,0,0]

#Khai bao cac gia tri thong so
n = nd = da = dat = ahs = 0

node1 = [0,0,0,0] #Du lieu Node1
node2 = [0,0,0,0] #Du lieu Node2
node3 = [0,0,0,0] #Du lieu Node3
node4 = [0,0,0,0] #Du lieu Node4

tl1 = [0,0,0,0,0,0] #Thiet lap Node1 #Ndmin Ndmax Datmin Datmax Asmin Asmax
tl2 = [0,0,0,0,0,0] #Thiet lap Node2
tl3 = [0,0,0,0,0,0] #Thiet lap Node3
tl4 = [0,0,0,0,0,0] #Thiet lap Node4

tl1w = [0,0,0,0,0,0] #Thiet lap Node1 #Ndmin Ndmax Datmin Datmax Asmin Asmax
tl2w = [0,0,0,0,0,0] #Thiet lap Node2
tl3w = [0,0,0,0,0,0] #Thiet lap Node3
tl4w = [0,0,0,0,0,0] #Thiet lap Node4
tlw = [0,0,0,0,0,0]
dkw = [0,0,0] #Dieu khien web
dk1w = [0,0,0] #Trang thai dieu khien 
dk = [0,0,0] #Trang thai dieu khien
#---------------------------------------
mycursor = '';
myresult = '';
#---------------------------------------
ser = serial.Serial(
    port = '/dev/ttyAMA0',
    baudrate = 38400,
    parity = serial.PARITY_NONE,
    stopbits = serial.STOPBITS_ONE,
    bytesize = serial.EIGHTBITS,
    timeout = 1
)
#---------------------------------------
def convert(list): #Tach mang thanh chuoi
    global res
    res = ""
    for i in list:
        if i < 10:
            res += '0' + str(i)
        elif i >= 100:
            res += str(99)
        else:
            res += str(i)
    return(res)
#----------------------------------------
def guicaidat(ten,mang):
    s2 = 't' + str(ten) + convert(mang) + 'l' + '\n'
    print("Gui thong so thiet lap cho node {:d}" .format(ten))
    print(s2)
    ser.write(s2)
    ser.flush()
    time.sleep(2)
#----------------------------------------
def docweb():
    global mycursor
    global myresult
    global tl1, tl2, tl3, tl4, ttn, td, dk, dkw, dk1w
    global tl1w, tl2w, tl3w, tl4w
    mydb = mysql.connector.connect(
    host="localhost",
    database="second_db",
    user="thong7991",
    passwd="raspberry"
)
    mycursor = mydb.cursor()
    mycursor.execute("SELECT * FROM node_1")
    myresult = mycursor.fetchone()
    tlw = myresult[1:9]
    tl1w = [tlw[1], tlw[0], tlw[7], tlw[6], int(round(tlw[3]/10,0)), int(round(tlw[2]/10,0))]

    mycursor = mydb.cursor()
    mycursor.execute("SELECT * FROM node_2")
    myresult = mycursor.fetchone()
    tlw = myresult[1:9]
    tl2w = [tlw[1], tlw[0], tlw[7], tlw[6], int(round(tlw[3]/10,0)), int(round(tlw[2]/10,0))]
    
    mycursor = mydb.cursor()
    mycursor.execute("SELECT * FROM node_3")
    myresult = mycursor.fetchone()
    tlw = myresult[1:9]
    tl3w = [tlw[1], tlw[0], tlw[7], tlw[6], int(round(tlw[3]/10,0)), int(round(tlw[2]/10,0))]

    mycursor = mydb.cursor()
    mycursor.execute("SELECT * FROM node_4")
    myresult = mycursor.fetchone()
    tlw = myresult[1:9]
    tl4w = [tlw[1], tlw[0], tlw[7], tlw[6], int(round(tlw[3]/10,0)), int(round(tlw[2]/10,0))]    

    mycursor = mydb.cursor()
    mycursor.execute("SELECT * FROM control")
    myresult = mycursor.fetchone()
    dkw = myresult[1:4]
    dk1w = [dkw[1], dkw[0], dkw[2]]
	#ghi gia tri thiet lap o web vao cac mang thiet lap
    if tl1 != tl1w:
        print("Nguoi dung vua thiet lap node1")
        td[1] = 1
        tl1 = tl1w
        guicaidat(1,tl1)
    else:
        if (ttn[1] == 0 and td[1] == 1):
            guicaidat(1,tl1)
        elif (ttn[1] == 1):
            td[1] = 0  

    if tl2 != tl2w:
        print("Nguoi dung vua thiet lap node2")
        td[2] = 1
        tl2 = tl2w
        guicaidat(2,tl2)
    else:
        if (ttn[2] == 0 and td[2] == 1):
            guicaidat(2,tl2)
        elif (ttn[2] == 1):
            td[2] = 0  

    if tl3 != tl3w:
        print("Nguoi dung vua thiet lap node3")
        td[3] = 1
        tl3 = tl3w
        guicaidat(3,tl3)
    else:
        if (ttn[3] == 0 and td[3] == 1):
            guicaidat(3,tl3)
        elif (ttn[3] == 1):
            td[3] = 0

    if tl4 != tl4w:
        print("Nguoi dung vua thiet lap node4")
        td[4] = 1
        tl4 = tl4w
        guicaidat(4,tl4)
    else:
        if (ttn[4] == 0 and td[4] == 1):
            guicaidat(4,tl4)
        elif (ttn[4] == 1):
            td[4] = 0

    if dk != dk1w:
        print("Nguoi dung vua dieu khien")
        dk = dk1w
        dongco()                          
#-------------------------------------
def dongco(): #Chi ho tro o node1 
    #  Neu node 1 van hoat dong
    if trangthai[1] == 1:
        #Neu nhiet do node1 < nhiet do min
        if node1[0] < tl1[0]:
            GPIO.output(2, GPIO.HIGH)  #Bat quat Suoi
        #Neu nhiet do node 1 > nhiet do max
        if node1[0] > tl1[1]: 
            GPIO.output(2, GPIO.LOW)   #Tat quat suoi
        #Neu do am dat node1 < do am dat min	
        if node1[2] < tl1[2]: 
            GPIO.output(3, GPIO.HIGH)  #Bat may bom nuoc
        #Neu do am dat node1 > do am dat max
        if node1[2] > tl1[3]: 
            GPIO.output(3, GPIO.LOW)  #Tat may bom nuoc
        #Neu anh sang node1 < anh sang min
        if node1[3] < tl1[4]:
            GPIO.output(4, GPIO.HIGH)  #Bat den chieu sang
        #Neu anh sang node1 > anh sang max
        if node1[3] > tl1[5]: 
            GPIO.output(4, GPIO.LOW)  #Tat den chieu sang
    if dk[0] != 0:
        GPIO.output(2, GPIO.HIGH) #Bat quat suoi
    if dk[0] == 0:
        GPIO.output(2, GPIO.LOW) #Tat quat suoi
    if dk[1] !=0:
        GPIO.output(3, GPIO.HIGH) #Bat may bom nuoc
    if dk[1] == 0:
        GPIO.output(3, GPIO.LOW) #Tat may bom nuoc
    if dk[2] != 0:
        GPIO.output(4, GPIO.HIGH) #Bat den chieu sang
    if dk[2] == 0:
        GPIO.output(4, GPIO.LOW) #Tat den chieu sang                        
#-------------------------------------
def tachGiaTri():
    global loi, node1, node2, node3, node4, trangthai
    print ("------------------------------------")
    n = s1[0]
    print ("Thong tin khu vuc {:d}:" .format(int(n)))
    nd = s1[1 : 3]
    print ("Nhiet do: {:d} *C" .format(int(nd)))
    da = s1[3 : 5]
    print ("Do am: {:d} %"  .format(int(da)))
    dat = s1[5 : 7]
    print ("Do am dat: {:d} %" .format(int(dat)))
    ahs = s1[7 : 9]
    print ("Anh sang: {:d} lux" .format(int(ahs)*10))
    if int(n) == 1:
        loi[1] = 0 
        trangthai[1] = 1
        node1 = [int(nd), int(da), int(dat), int(ahs)*10]
    if int(n) == 2:
        loi[2] = 0 
        trangthai[2] = 1
        node2 = [int(nd), int(da), int(dat), int(ahs)*10]
    if int(n) == 3:
        loi[3] = 0 
        trangthai[3] = 1
        node3 = [int(nd), int(da), int(dat), int(ahs)*10]
    if int(n) == 4:
        loi[4] = 0
        trangthai[4] = 1
        node4 = [int(nd), int(da), int(dat), int(ahs)*10]
    hienweb()
#---------------------------------------
def hienweb():
	global node1, node2, node3, node4
	threading.Timer(10,hienweb).start()
	http = urllib3.PoolManager()
	http.request('GET',"http://localhost/add_data.php?temp1="+str(node1[0])+"&humi1="+str(node1[1])+"&shumi1="+str(node1[2])+"&lux1="+str(node1[3])+
        "&temp2="+str(node2[0])+"&humi2="+str(node2[1])+"&shumi2="+str(node2[2])+"&lux2="+str(node2[3])+
        "&temp3="+str(node3[0])+"&humi3="+str(node3[1])+"&shumi3="+str(node3[2])+"&lux3="+str(node3[3])+
        "&temp4="+str(node4[0])+"&humi4="+str(node4[1])+"&shumi4="+str(node4[2])+"&lux4="+str(node4[3])).read()
#---------------------------------------
def ghinhanloi():
    global node, loi, node1, node2, node3, node4
    loi[node] += 1
    if loi[node] == 3:
        print("Node {:d} mat ket noi" .format(int(node)))
        trangthai[node] = 0 #Bat bao loi o node nay
        if node == 1:
            node1 = [0,0,0,0]
    	if node == 2:
    	    node2 = [0,0,0,0]
    	if node == 3:
    	    node3 = [0,0,0,0]
    	if node == 4:
    	    node4 = [0,0,0,0]
    	hienweb()
        loi[node] = 0
    elif loi[node] < 3:
        print("so loi hien tai cua node {:d}" .format(int(node)))
        print(loi[node])
        hienweb()
#---------------------------------------
while True:
    for node in range(1,5):
        docweb()
        dongco()
        #Gui yeu cau thong bao data toi cac node
        s2 = 'y' + str(node) + 'c' + '\n'
        print("Gui yeu cau {:d}" .format(node))
        ser.write(s2)
        ser.flush()
        s2 = ""
        time.sleep(2.5)
        #Doi 3 giay nhan uart bat dau doc du lieu
        data = ser.readline()
        #s = data.decode()               # decode s
        s = data.rstrip()                  # cut "\r\n" at last of string
        print(s)
        if s == "":
            ghinhanloi()
        else:
            print("Tach Gia tri")
            hot = s.count("h")
            if hot != 0:
                for i in range(hot):
                    bd = s.find("h")
                    k = s.count("t")
                    if k !=0:
                        kt = s.find ("t")
                        s1 = s[bd + 1: kt]
                        s  = s[: bd] + s[kt + 1:]
                        if len(s1) == 9 and s1.isdigit() == 1:
                            tachGiaTri()
                            if (int(s1[0]) == 1):
                                s2 = 'd' + str(1) + 'n' + '\n'
                                print("Da nhan file bao dong tu node1 va gui phan hoi")
                                ser.write(s2)
                                ser.flush()
                                s2 = ""
                            if (int(s1[0]) == 2):
                                s2 = 'd' + str(2) + 'n' + '\n'
                                print("Da nhan file bao dong tu node2 va gui phan hoi")
                                ser.write(s2)
                                ser.flush()
                                s2 = ""
                            if (int(s1[0]) == 3):
                                s2 = 'd' + str(3) + 'n' + '\n'
                                print("Da nhan file bao dong tu node3 va gui phan hoi")
                                ser.write(s2)
                                ser.flush()
                                s2 = ""
                            if (int(s1[0]) == 4):
                                s2 = 'd' + str(4) + 'n' + '\n'
                                print("Da nhan file bao dong tu node4 va gui phan hoi")
                                ser.write(s2)
                                ser.flush()
                                s2 = ""      
                            s1 = ""
            nhan = s.count("o")
            if nhan != 0:
                for i in range(nhan):
                    bd = s.find("o")
                    k = s.count("k")
                    if k != 0:
                        kt = s.find("k")
                        s1 = s[bd + 1: kt]
                        s  = s[: bd] + s[kt + 1:]
                        if len(s1) == 1 and s1.isdigit() == 1:
                            if int(s1) == 1:
                                ttn[1] = 1
                            if int(s1) == 2:
                                ttn[2] = 1
                            if int(s1) == 3:
                                ttn[3] = 1
                            if int(s1) == 4:
                                ttn[4] = 1        
                            s1 = ""                        
            l = s.count("s")
            if l !=0:
                for i in range(l):
                    bd = s.find("s")
                    k = s.count("e")
                    if k !=0:
                        kt = s.find ("e")
                        s1 = s[bd + 1: kt]
                        s = s [kt + 1:]
                        if len(s1) == 9 and s1.isdigit() == 1:
                            tachGiaTri()
                            s1 = ""
            else:
                ghinhanloi()
            s = ""





