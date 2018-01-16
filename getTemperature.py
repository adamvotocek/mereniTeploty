from sense_hat import SenseHat
import MySQLdb
from time import sleep
sense = SenseHat()

def UlozTeplotu(teplota):
    db = MySQLdb.connect("localhost","root","hesloheslo","popelnice" )
    cursor = db.cursor()

    sql = """INSERT INTO teplota (teplota)
         VALUES (%f)""" % teplota
    try:
       cursor.execute(sql)
       db.commit()
    except:
       print ("Chyba pri ukladani teploty")
       db.rollback()
    
    db.close()
    
while True:
    teplota = sense.get_temperature()
    print("Teplota: %s C" % teplota)

    UlozTeplotu(teplota)
    sleep(10)
    
    
    