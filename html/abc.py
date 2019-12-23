import mysql.connector
mydb = mysql.connector.connect(
  host="localhost",
  database="second_db",
  user="thong7991",
  passwd="raspberry"
)
mycursor = '';
myresult = '';
thietlap1 = [0,0,0,0,0,0] #Thiet lap Node1 #Ndmin Ndmax Datmin Datmax Asmin Asmax
thietlap2 = [0,0,0,0,0,0] #Thiet lap Node2
thietlap3 = [0,0,0,0,0,0] #Thiet lap Node3
thietlap4 = [0,0,0,0,0,0] #Thiet lap Node4

thietlap1w = [0,0,0,0,0,0] #Thiet lap Node1 #Ndmin Ndmax Datmin Datmax Asmin Asmax
thietlap2w = [0,0,0,0,0,0] #Thiet lap Node2
thietlap3w = [0,0,0,0,0,0] #Thiet lap Node3
thietlap4w = [0,0,0,0,0,0] #Thiet lap Node4
def abc():
  global mycursor
  global myresult
  global thietlap1, thietlap2, thietlap3, thietlap4
  global thietlap1w, thietlap2w, thietlap3w, thietlap4w
  mycursor = mydb.cursor()
  mycursor.execute("SELECT * FROM node_1")
  myresult = mycursor.fetchone()
  print(myresult[1])
  thietlap1w[1] = myresult[1]
  print(thietlap1w)
  a = 1 + thietlap1w[1]
  if thietlap1 != thietlap1w:
    print("lum")
  print(str(a))
abc()
