#!/usr/bin/python3
import threading
import socketserver
import sys
import os
import signal
import serial
import time
import subprocess
import MySQLdb
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
from datetime import date



#Irrigation zone 1
flagZ1 = 0
flagZ1o = 0
activi1Z1 = 0
orai1 = 0
minuti1 = 0
orai1oprit = 0
minuti1oprit = 0
activh1Z1 = 0
orah1 = 0
minuth1 = 0
orah1oprit = 0
minuth1oprit = 0
activi2Z1 = 0
orai1t2 = 0
minuti1t2 = 0
orai1t2oprit = 0
minuti1t2oprit = 0
activh2Z1 = 0
orah1t2 = 0
minuth1t2 = 0
orah1t2oprit = 0
minuth1t2oprit = 0

#Irrigation Zone 2
flagZ2 = 0
flagZ2o = 0
activi1Z2 = 0
orai2 = 0
minuti2 = 0
orai2oprit = 0
minuti2oprit = 0
activh1Z2 = 0
orah2 = 0
minuth2 = 0
orah2oprit = 0
minuth2oprit = 0
activi2Z2 = 0
orai2t2 = 0
minuti2t2 = 0
orai2t2oprit = 0
minuti2t2oprit = 0
activh2Z2 = 0
orah2t2 = 0
minuth2t2 = 0
orah2t2oprit = 0
minuth2t2oprit = 0

#Irrigation Zone 3
flagZ3 = 0
flagZ3o = 0
activi1Z3 = 0
orai3 = 0
minuti3 = 0
orai3oprit = 0
minuti3oprit = 0
activh1Z3 = 0
orah3 = 0
minuth3 = 0
orah3oprit = 0
minuth3oprit = 0
activi2Z3 = 0
orai3t2 = 0
minuti3t2 = 0
orai3t2oprit = 0
minuti3t2oprit = 0
activh2Z3 = 0
orah3t2 = 0
minuth3t2 = 0
orah3t2oprit = 0
minuth3t2oprit = 0

#Irrigation Zone 4
flagZ4 = 0
flagZ4o = 0
activi1Z4 = 0
orai4 = 0
minuti4 = 0
orai4oprit = 0
minuti4oprit = 0
activh1Z4 = 0
orah4 = 0
minuth4 = 0
orah4oprit = 0
minuth4oprit = 0
activi2Z4 = 0
orai4t2 = 0
minuti4t2 = 0
orai4t2oprit = 0
minuti4t2oprit = 0
activh2Z4 = 0
orah4t2 = 0
minuth4t2 = 0
orah4t2oprit = 0
minuth4t2oprit = 0

#Irrigation Zone 5
flagZ5 = 0
flagZ5o = 0
activi1Z5 = 0
orai5 = 0
minuti5 = 0
orai5oprit = 0
minuti5oprit = 0
activh1Z5 = 0
orah5 = 0
minuth5 = 0
orah5oprit = 0
minuth5oprit = 0
activi2Z5 = 0
orai5t2 = 0
minuti5t2 = 0
orai5t2oprit = 0
minuti5t2oprit = 0
activh2Z5 = 0
orah5t2 = 0
minuth5t2 = 0
orah5t2oprit = 0
minuth5t2oprit = 0

#Irrigation Zone 6
flagZ6 = 0
flagZ6o = 0
activi1Z6 = 0
orai6 = 0
minuti6 = 0
orai6oprit = 0
minuti6oprit = 0
activh1Z6 = 0
orah6 = 0
minuth6 = 0
orah6oprit = 0
minuth6oprit = 0
activi2Z6 = 0
orai6t2 = 0
minuti6t2 = 0
orai6t2oprit = 0
minuti6t2oprit = 0
activh2Z6 = 0
orah6t2 = 0
minuth6t2 = 0
orah6t2oprit = 0
minuth6t2oprit = 0

#Auxiliary system settings with 6 or 2 irrigation zone
auxSet = 0
#auxiliare
enablevent = 0
startVent = 0
stopVent = 0
enableheat = 0
startHeat = 1
stopHeat = 2
enabledaynight = 0
dayTemp = 1
nightTemp = 1
dayLux = 200
nightLux = 0
tempLucru = 0
enablelight = 0
startLight = 0
stopLight = 0
enablehumi = 0
startHumi = 0
stopHumi = 0

#Time settings -hour minute second and day
ora = 0
minut = 0
secunda = 0
ziua = 0

###Arduino sensors data settings
viteza=0
rafala=0
directie=0
tIn=0
uIn=0
tOut=0
uOut=0
tAer=0
tSol=0
lumina=0
dataPHP=0
Terr=0


# MySQL CONFORT Settings


#Motor 1 settings
pozitionare1 = 0
activ1 = 0
Topen1 = 0
Tclose1 = 0
Wwind1 = 0
Wclose1 = 0
timecycle1 = 0
steps1 = 0
break1 = 0
treapta1 = 10
tpornit1 = 0
tnext1 = 0
toprit1 = 0


#Motor 2
pozitionare2 = 0
activ2 = 0
Topen2 = 0
Tclose2 = 0
Wwind2 = 0
Wclose2 = 0
timecycle2 = 0
steps2 = 0
break2 = 0
treapta2 = 10
tpornit2 = 0
tnext2 = 0
toprit2 = 0

#Motor 3  
pozitionare3 = 0
activ3 = 0
Topen3 = 0
Tclose3 = 0
Wwind3 = 0
Wclose3 = 0
timecycle3 = 0
steps3 = 0
break3 = 0
treapta3 = 10
tpornit3 = 0
tnext3 = 0
toprit3 = 0

#Motor 4 
pozitionare4 = 0
activ4 = 0
Topen4 = 0
Tclose4 = 0
Wwind4 = 0
Wclose4 = 0
timecycle4 = 0
steps4 = 0
break4 = 0
treapta4 = 10
tpornit4 = 0
tnext4 = 0
toprit4 = 0
treapta4 = 10
tpornit4 = 0
tnext4 = 0
toprit4 = 0


#RPi Digital Pins Allocation with full auxiliary and only 2 irrigation zones
pompaI = 1         #Irrigation Pump
pinH = 7           #Fertilizer pump
pinZ1 = 2          #Valve pin for zone 1
pinZ2 = 3          #valve pin for zone 2
fan = 4            #electric ventilation fan 
heat = 0           #heat system control
plumina = 5        #lighing system pin
pdehumi = 6        #dehumidifier pin

#RPi Digital Pins Allocation without auxiliary but 6 irrigation zones
pompaI = 1         #Irrigation Pump
pinH = 7           #Fertilizer pump
pinZ1 = 2          #Valve pin for zone 1
pinZ2 = 3          #Valve pin for zone 2
pinZ3 = 4          #Valve pin for zone 3
pinZ4 = 0          #Valve pin for zone 4
pinZ5 = 5          #Valve pin for zone 5
pinZ6 = 6          #Valve pin for zone 6


#RPi Digital pins allocation for Confort Module Ventilation Motors
DS = 21 
IS = 20 
DD = 16
ID = 12
DS2 = 25 
IS2 = 23 
DD2 = 18
ID2 = 17

#RPi Digital pins allocation for Limit Sensors
LS = 26
LD = 19
LS2 = 13
LD2 = 22
Rst = 27
Rerr = 0
GPIO.setup(Rst, GPIO.OUT)
GPIO.output(Rst, GPIO.HIGH)

GPIO.setup(pinZ1, GPIO.OUT)
GPIO.setup(pinZ2, GPIO.OUT)
GPIO.setup(pinH, GPIO.OUT)
GPIO.setup(pompaI, GPIO.OUT)
GPIO.setup(heat, GPIO.OUT)
GPIO.setup(fan, GPIO.OUT)
GPIO.setup(plumina, GPIO.OUT)
GPIO.setup(pdehumi, GPIO.OUT)
GPIO.output(pinZ1, GPIO.HIGH)
GPIO.output(pinZ2, GPIO.HIGH)
GPIO.output(pinH, GPIO.HIGH)
GPIO.output(pompaI, GPIO.HIGH)
GPIO.output(heat, GPIO.HIGH)
GPIO.output(fan, GPIO.HIGH)
GPIO.output(plumina, GPIO.HIGH)
GPIO.output(pdehumi, GPIO.HIGH)

GPIO.setup(DD, GPIO.OUT)
GPIO.output(DD, GPIO.LOW)
GPIO.setup(ID, GPIO.OUT)
GPIO.output(ID, GPIO.LOW)
GPIO.setup(DS, GPIO.OUT)
GPIO.output(DS, GPIO.LOW)
GPIO.setup(IS, GPIO.OUT)
GPIO.output(IS, GPIO.LOW)
GPIO.setup(DD2, GPIO.OUT)
GPIO.output(DD2, GPIO.LOW)
GPIO.setup(ID2, GPIO.OUT)
GPIO.output(ID2, GPIO.LOW)
GPIO.setup(DS2, GPIO.OUT)
GPIO.output(DS2, GPIO.LOW)
GPIO.setup(IS2, GPIO.OUT)
GPIO.output(IS2, GPIO.LOW)

GPIO.setup(LS, GPIO.IN, pull_up_down = GPIO.PUD_UP)
GPIO.setup(LD, GPIO.IN, pull_up_down = GPIO.PUD_UP)
GPIO.setup(LS2, GPIO.IN, pull_up_down = GPIO.PUD_UP)
GPIO.setup(LD2, GPIO.IN, pull_up_down = GPIO.PUD_UP)



def updateTime():
    global ora
    global minut
    ora = int(time.strftime("%H"))
    minut = int(time.strftime("%M"))
    secunda = int(time.strftime("%S"))


def updateSet():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor()
        cursor.execute("select zones from settings WHERE 1")
        data = cursor.fetchall()
        global auxSet
        for row in data :
            auxSet = int(row[0])
        cursor.close()
        connection.close()
        print(auxSet)
    except MySQLdb.OperationalError:
        print ("eroare Update Setari")
        subprocess.Popen(["echo 'eroare update setari 1-6' >> /var/tmp/robofarm"], shell=True)
        time.sleep(2)
        return updateSet()
        pass
def updateirigareZ1():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor()
        cursor.execute("select activi1, OraPornireIrigare, MinutPornireIrigare, OraOprireIrigare, MinutOprireIrigare, activh1, OraPornireHrana, MinutPornireHrana, OraOprireHrana, MinutOprireHrana, activi2, OraPornireIrigare2, MinutPornireIrigare2, OraOprireIrigare2, MinutOprireIrigare2, activh2, OraPornireHrana2, MinutPornireHrana2, OraOprireHrana2, MinutOprireHrana2 from irigare WHERE id = 1")
        data = cursor.fetchall()
        global activi1Z1
        global orai1
        global minuti1
        global orai1oprit
        global minuti1oprit
        global activh1Z1
        global orah1
        global minuth1
        global orah1oprit
        global minuth1oprit
        global activi2Z1
        global orai1t2
        global minuti1t2
        global orai1t2oprit
        global minuti1t2oprit
        global activh2Z1
        global orah1t2
        global minuth1t2
        global orah1t2oprit
        global minuth1t2oprit
        for row in data :
            activi1Z1 = int(row[0])
            orai1 = int(row[1])
            minuti1 = int(row[2])
            orai1oprit = int(row[3])
            minuti1oprit = int(row[4])
            activh1Z1 = int(row[5])
            orah1 = int(row[6])
            minuth1 = int(row[7])
            orah1oprit = int(row[8])
            minuth1oprit = int(row[9])
            activi2Z1 = int(row[10])
            orai1t2 = int(row[11])
            minuti1t2 = int(row[12])
            orai1t2oprit = int(row[13])
            minuti1t2oprit = int(row[14])
            activh2Z1 = int(row[15])
            orah1t2 = int(row[16])
            minuth1t2 = int(row[17])
            orah1t2oprit = int(row[18])
            minuth1t2oprit = int(row[19])
        cursor.close()
        connection.close()
        print(activi1Z1, orai1, minuti1, orai1oprit, minuti1oprit, activh1Z1, orah1, minuth1, orah1oprit, minuth1oprit, activi2Z1, orai1t2, minuti1t2, orai1t2oprit, minuti1t2oprit, activh2Z1, orah1t2, minuth1t2, orah1t2oprit, minuth1t2oprit)
    except MySQLdb.OperationalError:
        print ("eroare Zona1")
        subprocess.Popen(["echo 'eroare Zona1' >> /var/tmp/robofarm"], shell=True)
        pass

def updateirigareZ2():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor()
        cursor.execute("select activi1, OraPornireIrigare, MinutPornireIrigare, OraOprireIrigare, MinutOprireIrigare, activh1, OraPornireHrana, MinutPornireHrana, OraOprireHrana, MinutOprireHrana, activi2, OraPornireIrigare2, MinutPornireIrigare2, OraOprireIrigare2, MinutOprireIrigare2, activh2, OraPornireHrana2, MinutPornireHrana2, OraOprireHrana2, MinutOprireHrana2 from irigare WHERE id = 2")
        data = cursor.fetchall()
        global activi1Z2
        global orai2
        global minuti2
        global orai2oprit
        global minuti2oprit
        global activh1Z2
        global orah2
        global minuth2
        global orah2oprit
        global minuth2oprit
        global activi2Z2
        global orai2t2
        global minuti2t2
        global orai2t2oprit
        global minuti2t2oprit
        global activh2Z2
        global orah2t2
        global minuth2t2
        global orah2t2oprit
        global minuth2t2oprit
        for row in data :
            activi1Z2 = int(row[0])
            orai2 = int(row[1])
            minuti2 = int(row[2])
            orai2oprit = int(row[3])
            minuti2oprit = int(row[4])
            activh1Z2 = int(row[5])
            orah2 = int(row[6])
            minuth2 = int(row[7])
            orah2oprit = int(row[8])
            minuth2oprit = int(row[9])
            activi2Z2 = int(row[10])
            orai2t2 = int(row[11])
            minuti2t2 = int(row[12])
            orai2t2oprit = int(row[13])
            minuti2t2oprit = int(row[14])
            activh2Z2 = int(row[15])
            orah2t2 = int(row[16])
            minuth2t2 = int(row[17])
            orah2t2oprit = int(row[18])
            minuth2t2oprit = int(row[19])
        cursor.close()
        connection.close()
        print(activi1Z2, orai2, minuti2, orai2oprit, minuti2oprit, activh1Z2, orah2, minuth2, orah2oprit, minuth2oprit, activi2Z2, orai2t2, minuti2t2, orai2t2oprit, minuti2t2oprit, activh2Z2, orah2t2, minuth2t2, orah2t2oprit, minuth2t2oprit)
    except MySQLdb.OperationalError:
        print ("eroare Zona2")
        subprocess.Popen(["echo 'eroare Zona2' >> /var/tmp/robofarm"], shell=True)
        pass

def updateirigareZ3():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor()
        cursor.execute("select activi1, OraPornireIrigare, MinutPornireIrigare, OraOprireIrigare, MinutOprireIrigare, activh1, OraPornireHrana, MinutPornireHrana, OraOprireHrana, MinutOprireHrana, activi2, OraPornireIrigare2, MinutPornireIrigare2, OraOprireIrigare2, MinutOprireIrigare2, activh2, OraPornireHrana2, MinutPornireHrana2, OraOprireHrana2, MinutOprireHrana2 from irigare WHERE id = 3")
        data = cursor.fetchall()
        global activi1Z3
        global orai3
        global minuti3
        global orai3oprit
        global minuti3oprit
        global activh1Z3
        global orah3
        global minuth3
        global orah3oprit
        global minuth3oprit
        global activi2Z3
        global orai3t2
        global minuti3t2
        global orai3t2oprit
        global minuti3t2oprit
        global activh2Z3
        global orah3t2
        global minuth3t2
        global orah3t2oprit
        global minuth3t2oprit
        for row in data :
            activi1Z3 = int(row[0])
            orai3 = int(row[1])
            minuti3 = int(row[2])
            orai3oprit = int(row[3])
            minuti3oprit = int(row[4])
            activh1Z3 = int(row[5])
            orah3 = int(row[6])
            minuth3 = int(row[7])
            orah3oprit = int(row[8])
            minuth3oprit = int(row[9])
            activi2Z3 = int(row[10])
            orai3t2 = int(row[11])
            minuti3t2 = int(row[12])
            orai3t2oprit = int(row[13])
            minuti3t2oprit = int(row[14])
            activh2Z3 = int(row[15])
            orah3t2 = int(row[16])
            minuth3t2 = int(row[17])
            orah3t2oprit = int(row[18])
            minuth3t2oprit = int(row[19])
        cursor.close()
        connection.close()
        print(activi1Z3, orai3, minuti3, orai3oprit, minuti3oprit, activh1Z3, orah3, minuth3, orah3oprit, minuth3oprit, activi2Z3, orai3t2, minuti3t2, orai3t2oprit, minuti3t2oprit, activh2Z3, orah3t2, minuth3t2, orah3t2oprit, minuth3t2oprit)
    except MySQLdb.OperationalError:
        print ("eroare Zona3")
        subprocess.Popen(["echo 'eroare Zona3' >> /var/tmp/robofarm"], shell=True)
        pass

def updateirigareZ4():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor()
        cursor.execute("select activi1, OraPornireIrigare, MinutPornireIrigare, OraOprireIrigare, MinutOprireIrigare, activh1, OraPornireHrana, MinutPornireHrana, OraOprireHrana, MinutOprireHrana, activi2, OraPornireIrigare2, MinutPornireIrigare2, OraOprireIrigare2, MinutOprireIrigare2, activh2, OraPornireHrana2, MinutPornireHrana2, OraOprireHrana2, MinutOprireHrana2 from irigare WHERE id = 4")
        data = cursor.fetchall()
        global activi1Z4
        global orai4
        global minuti4
        global orai4oprit
        global minuti4oprit
        global activh1Z4
        global orah4
        global minuth4
        global orah4oprit
        global minuth4oprit
        global activi2Z4
        global orai4t2
        global minuti4t2
        global orai4t2oprit
        global minuti4t2oprit
        global activh2Z4
        global orah4t2
        global minuth4t2
        global orah4t2oprit
        global minuth4t2oprit
        for row in data :
            activi1Z4 = int(row[0])
            orai4 = int(row[1])
            minuti4 = int(row[2])
            orai4oprit = int(row[3])
            minuti4oprit = int(row[4])
            activh1Z4 = int(row[5])
            orah4 = int(row[6])
            minuth4 = int(row[7])
            orah4oprit = int(row[8])
            minuth4oprit = int(row[9])
            activi2Z4 = int(row[10])
            orai4t2 = int(row[11])
            minuti4t2 = int(row[12])
            orai4t2oprit = int(row[13])
            minuti4t2oprit = int(row[14])
            activh2Z4 = int(row[15])
            orah4t2 = int(row[16])
            minuth4t2 = int(row[17])
            orah4t2oprit = int(row[18])
            minuth4t2oprit = int(row[19])
        cursor.close()
        connection.close()
        print(activi1Z4, orai4, minuti4, orai4oprit, minuti4oprit, activh1Z4, orah4, minuth4, orah4oprit, minuth4oprit, activi2Z4, orai4t2, minuti4t2, orai4t2oprit, minuti4t2oprit, activh2Z4, orah4t2, minuth4t2, orah4t2oprit, minuth4t2oprit)
    except MySQLdb.OperationalError:
        print ("eroare Zona4")
        subprocess.Popen(["echo 'eroare Zona4' >> /var/tmp/robofarm"], shell=True)
        pass
def updateirigareZ5():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor()
        cursor.execute("select activi1, OraPornireIrigare, MinutPornireIrigare, OraOprireIrigare, MinutOprireIrigare, activh1, OraPornireHrana, MinutPornireHrana, OraOprireHrana, MinutOprireHrana, activi2, OraPornireIrigare2, MinutPornireIrigare2, OraOprireIrigare2, MinutOprireIrigare2, activh2, OraPornireHrana2, MinutPornireHrana2, OraOprireHrana2, MinutOprireHrana2 from irigare WHERE id = 5")
        data = cursor.fetchall()
        global activi1Z5
        global orai5
        global minuti5
        global orai5oprit
        global minuti5oprit
        global activh1Z5
        global orah5
        global minuth5
        global orah5oprit
        global minuth5oprit
        global activi2Z5
        global orai5t2
        global minuti5t2
        global orai5t2oprit
        global minuti5t2oprit
        global activh2Z5
        global orah5t2
        global minuth5t2
        global orah5t2oprit
        global minuth5t2oprit
        for row in data :
            activi1Z5 = int(row[0])
            orai5 = int(row[1])
            minuti5 = int(row[2])
            orai5oprit = int(row[3])
            minuti5oprit = int(row[4])
            activh1Z5 = int(row[5])
            orah5 = int(row[6])
            minuth5 = int(row[7])
            orah5oprit = int(row[8])
            minuth5oprit = int(row[9])
            activi2Z5 = int(row[10])
            orai5t2 = int(row[11])
            minuti5t2 = int(row[12])
            orai5t2oprit = int(row[13])
            minuti5t2oprit = int(row[14])
            activh2Z5 = int(row[15])
            orah5t2 = int(row[16])
            minuth5t2 = int(row[17])
            orah5t2oprit = int(row[18])
            minuth5t2oprit = int(row[19])
        cursor.close()
        connection.close()
        print(activi1Z5, orai5, minuti5, orai5oprit, minuti5oprit, activh1Z5, orah5, minuth5, orah5oprit, minuth5oprit, activi2Z5, orai5t2, minuti5t2, orai5t2oprit, minuti5t2oprit, activh2Z5, orah5t2, minuth5t2, orah5t2oprit, minuth5t2oprit)
    except MySQLdb.OperationalError:
        print ("eroare Zona5")
        subprocess.Popen(["echo 'eroare Zona5' >> /var/tmp/robofarm"], shell=True)
        pass
def updateirigareZ6():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor()
        cursor.execute("select activi1, OraPornireIrigare, MinutPornireIrigare, OraOprireIrigare, MinutOprireIrigare, activh1, OraPornireHrana, MinutPornireHrana, OraOprireHrana, MinutOprireHrana, activi2, OraPornireIrigare2, MinutPornireIrigare2, OraOprireIrigare2, MinutOprireIrigare2, activh2, OraPornireHrana2, MinutPornireHrana2, OraOprireHrana2, MinutOprireHrana2 from irigare WHERE id = 6")
        data = cursor.fetchall()
        global activi1Z6
        global orai6
        global minuti6
        global orai6oprit
        global minuti6oprit
        global activh1Z6
        global orah6
        global minuth6
        global orah6oprit
        global minuth6oprit
        global activi2Z6
        global orai6t2
        global minuti6t2
        global orai6t2oprit
        global minuti6t2oprit
        global activh2Z6
        global orah6t2
        global minuth6t2
        global orah6t2oprit
        global minuth6t2oprit
        for row in data :
            activi1Z6 = int(row[0])
            orai6 = int(row[1])
            minuti6 = int(row[2])
            orai6oprit = int(row[3])
            minuti6oprit = int(row[4])
            activh1Z6 = int(row[5])
            orah6 = int(row[6])
            minuth6 = int(row[7])
            orah6oprit = int(row[8])
            minuth6oprit = int(row[9])
            activi2Z6 = int(row[10])
            orai6t2 = int(row[11])
            minuti6t2 = int(row[12])
            orai6t2oprit = int(row[13])
            minuti6t2oprit = int(row[14])
            activh2Z6 = int(row[15])
            orah6t2 = int(row[16])
            minuth6t2 = int(row[17])
            orah6t2oprit = int(row[18])
            minuth6t2oprit = int(row[19])
        cursor.close()
        connection.close()
        print(activi1Z6, orai6, minuti6, orai6oprit, minuti6oprit, activh1Z6, orah6, minuth6, orah6oprit, minuth6oprit, activi2Z6, orai6t2, minuti6t2, orai6t2oprit, minuti6t2oprit, activh2Z6, orah6t2, minuth6t2, orah6t2oprit, minuth6t2oprit)
    except MySQLdb.OperationalError:
        print ("eroare Zona6")
        subprocess.Popen(["echo 'eroare Zona6' >> /var/tmp/robofarm"], shell=True)
        pass

###MOTOARE
def updatedata1():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor ()
        cursor.execute ("select position, enable, Topen, Tclose, Wwind, Wclose, timecycle, steps, break from comfort WHERE id = 1")
        data = cursor.fetchall()
        global pozitionare1
        global activ1
        global Topen1
        global Tclose1
        global Wwind1
        global Wclose1
        global timecycle1
        global steps1
        global break1
        for row in data :
            pozitionare1 = int(row[0])
            activ1 = int(row[1])
            Topen1 = float(row[2])
            Tclose1 = float(row[3])
            Wwind1 = float(row[4])
            Wclose1 = float(row[5])
            timecycle1 = int(row[6])
            steps1 = int(row[7])
            break1 = int(row[8])
        cursor.close()
        print("data updated")
        print(pozitionare1, activ1, Topen1, Tclose1, Wwind1, Wclose1, timecycle1, steps1, break1)
        connection.close ()
    except MySQLdb.OperationalError:
        print ("eroare Motor 1")
        time.sleep(2)
        subprocess.Popen(["echo 'eroare Data1' >> /var/tmp/robofarm"], shell=True)
        return updatedata1()
        #time.sleep(1)
        pass

def updatedata2():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor ()
        cursor.execute ("select position, enable, Topen, Tclose, Wwind, Wclose, timecycle, steps, break from comfort WHERE id = 2")
        data = cursor.fetchall()
        global pozitionare2
        global activ2
        global Topen2
        global Tclose2
        global Wwind2
        global Wclose2
        global timecycle2
        global steps2
        global break2
        for row in data :
            pozitionare2 = int(row[0])
            activ2 = int(row[1])
            Topen2 = float(row[2])
            Tclose2 = float(row[3])
            Wwind2 = float(row[4])
            Wclose2 = float(row[5])
            timecycle2 = int(row[6])
            steps2 = int(row[7])
            break2 = int(row[8])
        cursor.close()
        print("data 2 updated")
        print(pozitionare2, activ2, Topen2, Tclose2, Wwind2, Wclose2, timecycle2, steps2, break2)
        connection.close ()
    except MySQLdb.OperationalError:
        print ("eroare Motor 2")
        time.sleep(2)
        subprocess.Popen(["echo 'eroare Data2' >> /var/tmp/robofarm"], shell=True)
        return updatedata2()
        #time.sleep(1)
        pass
####data motor 3-4
def updatedata3():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor ()
        cursor.execute ("select position, enable, Topen, Tclose, Wwind, Wclose, timecycle, steps, break from comfort WHERE id = 3")
        data = cursor.fetchall()
        global pozitionare3
        global activ3
        global Topen3
        global Tclose3
        global Wwind3
        global Wclose3
        global timecycle3
        global steps3
        global break3
        for row in data :
            pozitionare3 = int(row[0])
            activ3 = int(row[1])
            Topen3 = float(row[2])
            Tclose3 = float(row[3])
            Wwind3 = float(row[4])
            Wclose3 = float(row[5])
            timecycle3 = int(row[6])
            steps3 = int(row[7])
            break3 = int(row[8])
        cursor.close()
        print("data 3 updated")
        print(pozitionare3, activ3, Topen3, Tclose3, Wwind3, Wclose3, timecycle3, steps3, break3)
        connection.close ()
    except MySQLdb.OperationalError:
        #time.sleep(1)
        print ("eroare Motor 3")
        time.sleep(2)
        subprocess.Popen(["echo 'eroare Data3' >> /var/tmp/robofarm"], shell=True)
        return updatedata3()
        #time.sleep(1)
        pass

def updatedata4():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor ()
        cursor.execute ("select position, enable, Topen, Tclose, Wwind, Wclose, timecycle, steps, break from comfort WHERE id = 4")
        data = cursor.fetchall()
        global pozitionare4
        global activ4
        global Topen4
        global Tclose4
        global Wwind4
        global Wclose4
        global timecycle4
        global steps4
        global break4
        for row in data :
            pozitionare4 = int(row[0])
            activ4 = int(row[1])
            Topen4 = float(row[2])
            Tclose4 = float(row[3])
            Wwind4 = float(row[4])
            Wclose4 = float(row[5])
            timecycle4 = int(row[6])
            steps4 = int(row[7])
            break4 = int(row[8])
        cursor.close()
        print("data 4 updated")
        print(pozitionare4, activ4, Topen4, Tclose4, Wwind4, Wclose4, timecycle4, steps4, break4)
        connection.close ()
    except MySQLdb.OperationalError:
        #time.sleep(1)
        print ("eroare Motor 4")
        time.sleep(2)
        subprocess.Popen(["echo 'eroare Data4' >> /var/tmp/robofarm"], shell=True)
        return updatedata4()
        #time.sleep(1)
        pass

def updateAuxiliary():
    try:
        connection = MySQLdb.connect (host = "localhost", user = "ceres", passwd = "roboceres#", db = "roboceres")
        cursor = connection.cursor ()
        cursor.execute ("select enablevent, startVent, stopVent, enableheat, startHeat, stopHeat, enabledaynight, dayTemp, nightTemp, dayLux, nightLux, enablelight, startLightTime, stopLightTime, enableHumi, startHumi, stopHumi from auxiliary WHERE 1")
        data = cursor.fetchall()
        global enablevent
        global startVent
        global stopVent
        global enableheat
        global startHeat
        global stopHeat
        global enabledaynight
        global dayTemp
        global nightTemp
        global dayLux
        global nightLux
        global enablelight
        global startLight
        global stopLight
        global enablehumi
        global startHumi
        global stopHumi
        for row in data :
            enablevent = int(row[0])
            startVent = int(row[1])
            stopVent = int(row[2])
            enableheat = int(row[3])
            startHeat = int(row[4])
            stopHeat = int(row[5])
            enabledaynight = int(row[6])
            dayTemp = int(row[7])
            nightTemp = int(row[8])
            dayLux = int(row[9])
            nightLux = int(row[10])
            enablelight = int(row[11])
            startLight = int(row[12])
            stopLight = int(row[13])
            enablehumi = int(row[14])
            startHumi = int(row[15])
            stopHumi = int(row[16])
        cursor.close()
        print("Auxiliary updated")
        print(enablevent, startVent, stopVent, enableheat, startHeat, stopHeat, enabledaynight, dayTemp, nightTemp, dayLux, nightLux, enablelight, startLight, stopLight, enablehumi, startHumi, stopHumi)
        connection.close ()
    except MySQLdb.OperationalError:
        time.sleep(1)
        print ("eroare Auxiliare")
        subprocess.Popen(["echo 'eroare Data Auxiliare' >> /var/tmp/robofarm"], shell=True)
        return updateAuxiliary()
        #time.sleep(1)
        pass




####IRIGARE
def irigareZ1():
    global flagZ1
    global flagZ1o
    today = date.today()
       #electrovalva activa/fara pompa apa
    if activi1Z1 == 1 and ora == orai1 and minut == minuti1 and GPIO.input(pinZ1) == 1:
       GPIO.output(pinZ1, GPIO.LOW)  #deschidere electrovalva
       GPIO.output(pompaI, GPIO.LOW) #pornire pompa
       flagZ1o = 5
       print(("Pornire Z1:", today))
    if activi1Z1 == 1 and ora == orai1oprit and minut == minuti1oprit and GPIO.input(pinZ1) == 0:
       GPIO.output(pinZ1, GPIO.HIGH)  #inchidere electrovalva
       GPIO.output(pompaI, GPIO.HIGH) #oprire pompa
       print("oprire activ")
       flagZ1o = 0
    if activi2Z1 == 1 and ora == orai1t2 and minut == minuti1t2 and GPIO.input(pinZ1) == 1:
       GPIO.output(pinZ1, GPIO.LOW) #deschide electrovalva
       GPIO.output(pompaI, GPIO.LOW) #pornire pompa
       print(("Pornire Z1 faza2:", today))
       flagZ1o = 5
    if activi2Z1 == 1 and ora == orai1t2oprit and minut == minuti1t2oprit and GPIO.input(pinZ1) == 0:
       GPIO.output(pinZ1, GPIO.HIGH) #inchide electrovalva
       GPIO.output(pompaI, GPIO.HIGH) #oprire pompa
       flagZ1o = 0
       print("activ 2 oprit")



    if activi1Z1 == 1 and activh1Z1 == 1 and ora == orah1 and minut == minuth1 and flagZ1o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 1 pornit")

    if activi1Z1 == 1 and activh1Z1 == 1 and ora == orah1oprit and minut == minuth1oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 1 oprit")

    if activi2Z1 == 1 and activh2Z1 == 1 and ora == orah1t2 and minut == minuth1t2 and flagZ1o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 2 pornit")

    if activi2Z1 == 1 and activh2Z1 == 1 and ora == orah1t2oprit and minut == minuth1t2oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 2 oprit")

def irigareZ2():
    global flagZ2
    global flagZ2o
    today = date.today()
    if activi1Z2 == 1 and ora == orai2 and minut == minuti2 and GPIO.input(pinZ2) == 1:
       GPIO.output(pinZ2, GPIO.LOW)  #deschidere electrovalva
       GPIO.output(pompaI, GPIO.LOW)
       flagZ2o = 5
       print(("Pornire Z2:", today))
    if activi1Z2 == 1 and ora == orai2oprit and minut == minuti2oprit and GPIO.input(pinZ2) == 0:
       GPIO.output(pinZ2, GPIO.HIGH)  #inchidere electrovalva
       GPIO.output(pompaI, GPIO.HIGH)
       print("oprire activ")
       flagZ2o = 0
    
    if activi2Z2 == 1 and ora == orai2t2 and minut == minuti2t2 and GPIO.input(pinZ2) == 1:
       GPIO.output(pinZ2, GPIO.LOW) #deschide electrovalva
       GPIO.output(pompaI, GPIO.LOW)
       print(("Pornire Z2 faza2:", today))
       flagZ2o = 5
    
    if activi2Z2 == 1 and ora == orai2t2oprit and minut == minuti2t2oprit and GPIO.input(pinZ2) == 0:
       GPIO.output(pinZ2, GPIO.HIGH) #inchide electrovalva
       GPIO.output(pompaI, GPIO.HIGH)
       flagZ2o = 0
       print("activ 2 oprit")

    if activi1Z2 == 1 and activh1Z2 == 1 and minut == minuth2 and flagZ2o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 1 pornit")

    if activi1Z2 == 1 and activh1Z2 == 1 and ora == orah2oprit and minut == minuth2oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 1 oprit")

    if activi2Z2 == 1 and activh2Z2 == 1 and ora == orah2t2 and minut == minuth2t2 and flagZ2o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 2 pornit")

    if activi2Z2 == 1 and activh2Z2 == 1 and ora == orah2t2oprit and minut == minuth2t2oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 2 oprit")

def irigareZ3():
    global flagZ3
    global flagZ3o
    today = date.today()
    if activi1Z3 == 1 and ora == orai3 and minut == minuti3 and GPIO.input(pinZ3) == 1:
       GPIO.output(pinZ3, GPIO.LOW)  #deschidere electrovalva
       GPIO.output(pompaI, GPIO.LOW)
       flagZ3o = 5
       print(("Pornire Z3:", today))
    if activi1Z3 == 1 and ora == orai3oprit and minut == minuti3oprit and GPIO.input(pinZ3) == 0:
       GPIO.output(pinZ3, GPIO.HIGH)  #inchidere electrovalva
       GPIO.output(pompaI, GPIO.HIGH)
       print("oprire activ")
       flagZ3o = 0

    if activi2Z3 == 1 and ora == orai3t2 and minut == minuti3t2 and GPIO.input(pinZ3) == 1:
       GPIO.output(pinZ3, GPIO.LOW) #deschide electrovalva
       GPIO.output(pompaI, GPIO.LOW)
       print(("Pornire Z3 faza 2:", today))
       flagZ3o = 5

    if activi2Z3 == 1 and ora == orai3t2oprit and minut == minuti3t2oprit and GPIO.input(pinZ3) == 0:
       GPIO.output(pinZ3, GPIO.HIGH) #inchide electrovalva
       GPIO.output(pompaI, GPIO.HIGH)
       flagZ3o = 0
       print("activ 2 oprit")

    if activi1Z3 == 1 and activh1Z3 == 1 and minut == minuth3 and flagZ3o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 1 pornit")

    if activi1Z3 == 1 and activh1Z3 == 1 and ora == orah3oprit and minut == minuth3oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 1 oprit")

    if activi2Z3 == 1 and activh2Z3 == 1 and ora == orah3t2 and minut == minuth3t2 and flagZ3o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 2 pornit")

    if activi2Z3 == 1 and activh2Z3 == 1 and ora == orah3t2oprit and minut == minuth3t2oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 2 oprit")

def irigareZ4():
    global flagZ4
    global flagZ4o
    today = date.today()
    if activi1Z4 == 1 and ora == orai4 and minut == minuti4 and GPIO.input(pinZ4) == 1:
       GPIO.output(pinZ4, GPIO.LOW)  #deschidere electrovalva
       GPIO.output(pompaI, GPIO.LOW)
       flagZ4o = 5
       print(("Pornire Z4:", today))
    if activi1Z4 == 1 and ora == orai4oprit and minut == minuti4oprit and GPIO.input(pinZ4) == 0:
       GPIO.output(pinZ4, GPIO.HIGH)  #inchidere electrovalva
       GPIO.output(pompaI, GPIO.HIGH)
       print("oprire activ")
       flagZ4o = 0

    if activi2Z4 == 1 and ora == orai4t2 and minut == minuti4t2 and GPIO.input(pinZ4) == 1:
       GPIO.output(pinZ4, GPIO.LOW) #deschide electrovalva
       GPIO.output(pompaI, GPIO.LOW)
       print(("Pornire Z4 faza2:", today))
       flagZ4o = 5

    if activi2Z4 == 1 and ora == orai4t2oprit and minut == minuti4t2oprit and GPIO.input(pinZ4) == 0:
       GPIO.output(pinZ4, GPIO.HIGH) #inchide electrovalva
       GPIO.output(pompaI, GPIO.HIGH)
       flagZ4o = 0
       print("activ 2 oprit")

    if activi1Z4 == 1 and activh1Z4 == 1 and minut == minuth4 and flagZ4o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 1 pornit")

    if activi1Z4 == 1 and activh1Z4 == 1 and ora == orah4oprit and minut == minuth4oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 1 oprit")

    if activi2Z4 == 1 and activh2Z4 == 1 and ora == orah4t2 and minut == minuth4t2 and flagZ4o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 2 pornit")

    if activi2Z4 == 1 and activh2Z4 == 1 and ora == orah4t2oprit and minut == minuth4t2oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 2 oprit")

def irigareZ5():
    global flagZ5
    global flagZ5o
    today = date.today()
    if activi1Z5 == 1 and ora == orai5 and minut == minuti5 and GPIO.input(pinZ5) == 1:
       GPIO.output(pinZ5, GPIO.LOW)  #deschidere electrovalva
       GPIO.output(pompaI, GPIO.LOW)
       flagZ5o = 5
       print(("Pornire Z5:", today))
    if activi1Z5 == 1 and ora == orai5oprit and minut == minuti5oprit and GPIO.input(pinZ5) == 0:
       GPIO.output(pinZ5, GPIO.HIGH)  #inchidere electrovalva
       GPIO.output(pompaI, GPIO.HIGH)
       print("oprire activ")
       flagZ5o = 0

    if activi2Z5 == 1 and ora == orai5t2 and minut == minuti5t2 and GPIO.input(pinZ5) == 1:
       GPIO.output(pinZ5, GPIO.LOW) #deschide electrovalva
       GPIO.output(pompaI, GPIO.LOW)
       print(("Pornire Z5 faza2:", today))
       flagZ5o = 5

    if activi2Z5 == 1 and ora == orai5t2oprit and minut == minuti5t2oprit and GPIO.input(pinZ5) == 0:
       GPIO.output(pinZ5, GPIO.HIGH) #inchide electrovalva
       GPIO.output(pompaI, GPIO.HIGH)
       flagZ5o = 0
       print("activ 2 oprit")

    if activi1Z5 == 1 and activh1Z5 == 1 and minut == minuth5 and flagZ5o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 1 pornit")

    if activi1Z5 == 1 and activh1Z5 == 1 and ora == orah5oprit and minut == minuth5oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 1 oprit")

    if activi2Z5 == 1 and activh2Z5 == 1 and ora == orah5t2 and minut == minuth5t2 and flagZ5o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 2 pornit")

    if activi2Z5 == 1 and activh2Z5 == 1 and ora == orah5t2oprit and minut == minuth5t2oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 2 oprit")

def irigareZ6():
    global flagZ6
    global flagZ6o
    today = date.today()
    if activi1Z6 == 1 and ora == orai6 and minut == minuti6 and GPIO.input(pinZ6) == 1:
       GPIO.output(pinZ6, GPIO.LOW)  #deschidere electrovalva
       GPIO.output(pompaI, GPIO.LOW)
       flagZ6o = 5
       print(("Pornire Z6:", today))
    if activi1Z6 == 1 and ora == orai6oprit and minut == minuti6oprit and GPIO.input(pinZ6) == 0:
       GPIO.output(pinZ6, GPIO.HIGH)  #inchidere electrovalva
       GPIO.output(pompaI, GPIO.HIGH)
       print("oprire activ")
       flagZ6o = 0

    if activi2Z6 == 1 and ora == orai6t2 and minut == minuti6t2 and GPIO.input(pinZ6) == 1:
       GPIO.output(pinZ6, GPIO.LOW) #deschide electrovalva
       GPIO.output(pompaI, GPIO.LOW)
       print(("Pornire Z6 faza2:", today))
       flagZ6o = 5

    if activi2Z6 == 1 and ora == orai6t2oprit and minut == minuti6t2oprit and GPIO.input(pinZ6) == 0:
       GPIO.output(pinZ6, GPIO.HIGH) #inchide electrovalva
       GPIO.output(pompaI, GPIO.HIGH)
       flagZ6o = 0
       print("activ 2 oprit")

    if activi1Z6 == 1 and activh1Z6 == 1 and minut == minuth6 and flagZ6o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 1 pornit")

    if activi1Z6 == 1 and activh1Z6 == 1 and ora == orah6oprit and minut == minuth6oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 1 oprit")

    if activi2Z6 == 1 and activh2Z6 == 1 and ora == orah6t2 and minut == minuth6t2 and flagZ6o > 0 and GPIO.input(pinH) == 1:
       GPIO.output(pinH, GPIO.LOW) #porneste pompa
       print("hrana timp 2 pornit")

    if activi2Z6 == 1 and activh2Z6 == 1 and ora == orah6t2oprit and minut == minuth6t2oprit and GPIO.input(pinH) == 0:
       GPIO.output(pinH, GPIO.HIGH) #opreste pompa
       print("hrana timp 2 oprit")


#Setari Motor 1
def Motor1On():
    global tpornit1
    global toprit1
    global tnext1
    global treapta1
    if treapta1 > 0 and GPIO.input(LS) == 0:
       treapta1 = 0
    if (treapta1 == 0):
        tpornit1 = time.time()
        toprit1 = tpornit1 + (timecycle1/steps1)
        tnext1 = toprit1 + break1
        GPIO.output(DS, GPIO.HIGH)
    if (treapta1 >= 1):
        tpornit1 = time.time()
        toprit1 = tpornit1 + (timecycle1/steps1)
        tnext1 = toprit1 + break1
        GPIO.output(DS, GPIO.HIGH)

def Motor1Off():
    global treapta1
    treapta1 = treapta1+1
    GPIO.output(DS, GPIO.LOW)

def Motor1():
    global treapta1
    global tpornit1
    if activ1 == 0:
       GPIO.output(DS, GPIO.LOW)
       GPIO.output(IS, GPIO.LOW)

    if activ1 == 1 and time.time() > tnext1 and  tIn >= Topen1 and Wclose1 >= rafala and steps1 > treapta1 and treapta1 >= 1 :
       Motor1On()
       print ('motor 1 pornit treapta {treapta1}')

    if activ1 == 1 and time.time() > tnext1 and  tIn >= Topen1 and Wclose1 >= rafala and steps1 > treapta1 and time.time() > tpornit1 :
       Motor1On()
       print("motor 1 pornit treapta {treapta1}")

    if activ1 == 1 and time.time() >= toprit1 and GPIO.input(DS) == 1:
       Motor1Off()
       print ("opreste motor 1")

    if activ1 == 1 and Tclose1 >= tIn  and GPIO.input(LS) == 1 and GPIO.input(IS) == 0:
       treapta1 = 10
       print ("inchide motor 1 temp")

    if activ1 == 1 and rafala >= Wclose1 and GPIO.input(LS) == 1 and GPIO.input(IS) == 0:
       treapta1 = 10
       print ("inchide motor 1 vant")

    if activ1 == 1 and treapta1 == 10 and GPIO.input(LS) == 0:
       GPIO.output(IS, GPIO.LOW)  #opreste inchiderea
       print ("opreste motor 1 reset")
       treapta1 = 0
       tpornit1 = time.time() + 5


    if activ1 == 1 and treapta1 == 10 and GPIO.input(LS) == 1 and GPIO.input(IS) == 0:
       GPIO.output(IS, GPIO.HIGH) #inchidere stanga
       print ("inchide motor 1 reset")
       treapta1 = 10

    if activ1 == 1 and treapta1 == 0 and GPIO.input(LS) == 1 and GPIO.input(IS) == 0 and GPIO.input(DS) == 0:
       print ("Reglaj Inchidere Motor 1")
       treapta1 = 10

#SETARI MOTOR 2
def Motor2On():
    global tpornit2
    global toprit2
    global tnext2
    global treapta2
    if treapta2 > 0 and GPIO.input(LD) == 0:
       treapta2 = 0
    if (treapta2 == 0):
        tpornit2 = time.time()
        toprit2 = tpornit2 + (timecycle2/steps2)
        tnext2 = toprit2 + break2
        GPIO.output(DD, GPIO.HIGH)
    if (treapta2 > 0 and GPIO.input(LD) == 1):
        tpornit2 = time.time()
        toprit2 = tpornit2 + (timecycle2/steps2)
        tnext2 = toprit2 + break2
        GPIO.output(DD, GPIO.HIGH)

def Motor2Off():
    global treapta2
    treapta2 = treapta2+1
    GPIO.output(DD, GPIO.LOW)

def Motor2():
    global treapta2
    global tpornit2
    if activ2 == 0:
       GPIO.output(DD, GPIO.LOW)
       GPIO.output(ID, GPIO.LOW)
    if activ2 == 1 and time.time() > tnext2 and  tIn >= Topen2 and Wclose2 >= rafala and steps2 > treapta2 and treapta2 >= 1 :
       Motor2On()
       print('motor 2 pornit treapta 1+ {treapta2}')

    if activ2 == 1 and time.time() > tnext2 and  tIn >= Topen2 and Wclose2 >= rafala and steps2 > treapta2 and time.time() > tpornit2 :
       Motor2On()
       print("porneste motor 2 treapta {treapta2}")

    if activ2 == 1 and time.time() >= toprit2 and GPIO.input(DD) == 1:
       Motor2Off()
       print ("opreste motor 2")

    if activ2 == 1 and Tclose2 >= tIn  and GPIO.input(LD) == 1 and GPIO.input(ID) == 0:
       treapta2 = 10
       print ("inchide motor 2 temp")

    if activ2 == 1 and rafala >= Wclose2 and GPIO.input(LD) == 1 and GPIO.input(ID) == 0:
       treapta2 = 10
       print ("inchide motor 2 vant puternic")

    if activ2 == 1 and treapta2 == 10 and GPIO.input(LD) == 0:
       GPIO.output(ID, GPIO.LOW) #opreste inchiderea
       print ("opreste inchidere motor 2 reset")
       treapta2 = 0
       tpornit2 = time.time() + 5

    if activ2 == 1 and treapta2 == 10 and GPIO.input(LD) == 1 and GPIO.input(ID) == 0:
       GPIO.output(ID, GPIO.HIGH) #inchidere dreapta
       print ("inchide motor 2 reset")
       treapta2 = 10

    if activ2 == 1 and treapta2 == 0 and GPIO.input(LD) == 1 and GPIO.input(ID) == 0 and GPIO.input(DD) == 0:
       treapta2 = 10 #inchidere dreapta
       print ("Reglaj Inchidere Motor 2")

#####motor set 2

def Motor3On():
    global treapta3
    global toprit3
    global tnext3
    global treapta3
    if treapta3 > 0 and GPIO.input(LS2) == 0:
       treapta3 = 0
    if (treapta3 == 0):
        tpornit3 = time.time()
        toprit3 = tpornit3 + (timecycle3/steps3)
        tnext3 = toprit3 + break3
        GPIO.output(DS2, GPIO.HIGH)
    if (treapta3 >= 1):
        tpornit3 = time.time()
        toprit3 = tpornit3 + (timecycle3/steps3)
        tnext3 = toprit3 + break3
        GPIO.output(DS2, GPIO.HIGH)

def Motor3Off():
    global treapta3
    treapta3 = treapta3+1
    GPIO.output(DS2, GPIO.LOW)

def Motor3():
    global treapta3
    global tpornit3
    if activ3 == 0:
       GPIO.output(IS2, GPIO.LOW)
       GPIO.output(DS2, GPIO.LOW)
    if activ3 == 1 and time.time() > tnext3 and  tIn >= Topen3 and Wclose3 >= rafala and steps3 > treapta3 and treapta3 >= 1 :
       Motor3On()
       print('motor 3 pornit treapta 1+ {treapta3}')

    if activ3 == 1 and time.time() > tnext3 and  tIn >= Topen3 and Wclose3 >= rafala and steps3 > treapta3 and time.time() > tpornit3 :
       Motor3On()
       print("porneste motor 3 treapta {treapta3}")

    if activ3 == 1 and time.time() >= toprit3 and GPIO.input(DS2) == 1:
       Motor3Off()
       print ("opreste motor 3")

    if activ3 == 1 and Tclose3 >= tIn  and GPIO.input(LS2) == 1 and GPIO.input(IS2) == 0:
       treapta3 = 10
       print ("inchide motor 3 temp")

    if activ3 == 1 and rafala >= Wclose3 and GPIO.input(LS2) == 1 and GPIO.input(IS2) == 0:
       treapta3 = 10
       print ("inchide motor 3 vant puternic")

    if activ3 == 1 and treapta3 == 10 and GPIO.input(LS2) == 0:
       GPIO.output(IS2, GPIO.LOW) #opreste inchiderea
       print ("oprit moto 3")
       treapta3 = 0
       tpornit3 = time.time() + 5

    if activ3 == 1 and treapta3 == 10 and GPIO.input(LS2) == 1 and GPIO.input(IS2) == 0:
       GPIO.output(IS2, GPIO.HIGH)#inchidere stanga
       print ("inchide motor 3 reset")
       treapta3 = 10

    if activ3 == 1 and treapta3 == 0 and GPIO.input(LS2) == 1 and GPIO.input(IS2) == 0 and GPIO.input(IS2) == 0:
       print ("Reglaj Inchidere Motor 3")
       treapta3 = 10


#SETARI MOTOR DREAPTA
def Motor4On():
    global tpornit4
    global toprit4
    global tnext4
    global treapta4
    if treapta4 > 0 and GPIO.input(LD2) == 0:
       treapta4 = 0
    if (treapta4 == 0):
        tpornit4 = time.time()
        toprit4 = tpornit4 + (timecycle4/steps4)
        tnext4 = toprit4 + break4
        GPIO.output(DD2, GPIO.HIGH)
    if (treapta4 >= 1):
        tpornit4 = time.time()
        toprit4 = tpornit4 + (timecycle4/steps4)
        tnext4 = toprit4 + break4
        GPIO.output(DD2, GPIO.HIGH)

def Motor4Off():
    global treapta4
    treapta4 = treapta4+1
    GPIO.output(DD2, GPIO.LOW)

def Motor4():
    global treapta4
    global tpornit4
    if activ4 == 0:
       GPIO.output(DD2, GPIO.LOW)
       GPIO.output(ID2, GPIO.LOW)
    if activ4 == 1 and time.time() > tnext4 and  tIn >= Topen4 and Wclose4 >= rafala and steps4 > treapta4 and treapta4 >= 1 :
       Motor4On()
       print('motor 3 pornit treapta 1+ {treapta4}')

    if activ4 == 1 and time.time() > tnext4 and  tIn >= Topen4 and Wclose4 >= rafala and steps4 > treapta4 and time.time() > tpornit4 :
       Motor4On()
       print("porneste motor 4 treapta {treapta2}")
       print(treapta4)

    if activ4 == 1 and time.time() >= toprit4 and GPIO.input(DD2) == 1:
       Motor4Off()
       print ("opreste motor 4")

    if activ4 == 1 and Tclose4 >= tIn  and GPIO.input(LD2) == 1 and GPIO.input(ID2) == 0:
       treapta4 = 10
       print ("inchide motor 4 temp")

    if activ4 == 1 and rafala >= Wclose4 and GPIO.input(LD2) == 1 and GPIO.input(ID2) == 0:
       treapta4 = 10
       print ("inchide motor 4 vant")

    if activ4 == 1 and treapta4 == 10 and GPIO.input(LD2) == 0:
       GPIO.output(ID2, GPIO.LOW) #opreste inchiderea
       print ("motor 4 oprit")
       treapta4 = 0
       tpornit4 = time.time() + 5

    if activ4 == 1 and treapta4 == 10 and GPIO.input(LD2) == 1 and GPIO.input(ID2) == 0:
       GPIO.output(ID2, GPIO.HIGH)  #inchidere dreapta
       print ("inchide motor 4 reset")
       treapta4 = 10

    if activ4 == 1 and treapta4 == 0 and GPIO.input(LD2) == 1 and GPIO.input(ID2) == 0 and GPIO.input(DD2) == 0:
       print ("Reglaj Inchidere Motor 4")
       treapta4 = 10

####termiant set2
###Auxiliare

def fanaction():
    
    if enablevent == 1 and tIn >= startVent and GPIO.input(fan) == 1:
       GPIO.output(fan, GPIO.LOW)

    if enablevent == 1 and stopVent >= tIn and GPIO.input(fan) == 0 :
       GPIO.output(fan, GPIO.HIGH)

    if enablevent == 0:
       GPIO.output(fan, GPIO.HIGH)

def heataction():
    global tempLucru
    #templucru = map(lightLevel, minLight, maxLight, tempMinras, tempMaxras);
    #print "heat action"
    #print tempLucru, lumina, nightLux, dayLux, startHeat, stopHeat
    tempLucru = arduino_map(lumina, nightLux, dayLux, startHeat, stopHeat)
    #print tempLucru, lumina, nightLux, dayLux, startHeat, stopHeat
    if enableheat == 0:
       GPIO.output(heat, GPIO.HIGH)    
    if enableheat == 1 and enabledaynight == 0 and startHeat >= tIn and GPIO.input(heat) == 1:
       GPIO.output(heat, GPIO.LOW)
    if enableheat == 1 and enabledaynight == 0 and tIn >= stopHeat and GPIO.input(heat) == 0:
       GPIO.output(heat, GPIO.HIGH)

    if enableheat == 1 and enabledaynight == 1 and tIn >= tempLucru and GPIO.input(heat) == 1:
       GPIO.output(heat, GPIO.LOW)
    if enableheat == 1 and enabledaynight == 1 and tempLucru+1 >= tIn and GPIO.input(heat) == 0:
       GPIO.output(heat, GPIO.HIGH)

def lightaction():
    if enablelight == 0:
       GPIO.output(plumina, GPIO.HIGH)
    if enablelight == 1 and startLight >= lumina and GPIO.input(plumina) == 1:
       GPIO.output(plumina, GPIO.LOW)
    if enablelight == 1 and lumina >= stopLight and GPIO.input(plumina) == 0:
       GPIO.output(plumina, GPIO.HIGH)

def humiaction():
    if enablehumi == 0:
       GPIO.output(pdehumi, GPIO.HIGH)
    if enablehumi == 1 and uIn >= startHumi and GPIO.input(pdehumi) == 1:
       GPIO.output(pdehumi, GPIO.LOW)
    if enablehumi == 1 and stopHumi >= uIn and GPIO.input(pdehumi) == 0:
       GPIO.output(pdehumi, GPIO.HIGH)

def arduinoData():
    try:
        arduinoSerialData = serial.Serial(port = "/dev/ttyAMA0", baudrate=9600, timeout=3)
        while(arduinoSerialData.inWaiting()==0):
          break
        global Rerr, Terr, viteza, rafala, directie, tIn, uIn, tOut, uOut, tAer, tSol, lumina, dataPHP
        arduinoSerialData.write(str.encode('S'))
        sensorCallInfo = arduinoSerialData.readline()
        arduinoSerialData.close()
        sensorCallInfo = sensorCallInfo.decode()
        dataNums = sensorCallInfo.split(';')
        if float(dataNums[3]) == -77:
           Terr = Terr + 1
        if float(dataNums[3]) < tIn-10 :
           Terr = Terr + 1
        if Terr == 15:
           tIn = 98
        if float(dataNums[3]) > -77 and float(dataNums[3]) > tIn-10:
           viteza = float(dataNums[0])
           rafala = float(dataNums[1])
           directie = int(dataNums[2])
           tIn = float(dataNums[3])
           uIn = float(dataNums[4])
           tOut = float(dataNums[5])
           uOut = float(dataNums[6])
           tAer = float(dataNums[7])
           tSol = float(dataNums[8])
           lumina = float(dataNums[9])
           Terr = 0
        if tIn == -77 and Terr > 9 :
           tIn = 99
        dataPHP = {viteza, rafala, directie, tIn, uIn, tOut, uOut, tAer, tSol, lumina}
        #dataPHP = str.encode(dataPHP)
        Rerr = 0
        print(viteza, rafala, directie, tIn, uIn, tOut, uOut, tAer, tSol, lumina)
    except (OSError, ValueError, IndexError, serial.serialutil.SerialException):
        dataPHP = {viteza, rafala, directie, tIn, uIn, tOut, uOut, tAer, tSol, lumina}
        #dataPHP = str.encode(dataPHP)
        Rerr = Rerr+1
        if Rerr == 10:
           GPIO.output(Rst, GPIO.LOW)
           time.sleep(0.1)
           GPIO.output(Rst, GPIO.HIGH)
           print("blocat")
           Rerr = 0
        pass

##setari harta
def arduino_map(x, in_min, in_max, out_min, out_max):
    return (x - in_min) * (out_max - out_min) // (in_max - in_min) + out_min


###SOCKET SOCKET
class ThreadedTCPRequestHandler(socketserver.BaseRequestHandler):

    def handle(self):
        try:
            data1 = self.request.recv(1024).strip()
            data1 = data1.decode()
            #data1 = self.request.recv(1024).strip()
            print(data1)
            global dataPHP
            global treapta1
            global treapta2
            global treapta3
            global treapta4
            if data1 == "confortR":
               m1 = 0
               m2 = 0
               m3 = 0
               m4 = 0
               if treapta1 < 10:
                  m1 = arduino_map(treapta1, 0, steps1, 0, 100)
               if treapta1 == 10:
                  m1 = 101
               if treapta2 < 10:
                  m2 = arduino_map(treapta2, 0, steps2, 0, 100)
               if treapta2 == 10:
                  m2 = 101

               if treapta3 < 10:
                  m3 = arduino_map(treapta3, 0, steps3, 0, 100)
               if treapta3 == 10:
                  m3 = 101

               if treapta4 < 10:
                  m4 = arduino_map(treapta4, 0, steps4, 0, 100)
               if treapta4 == 10:
                  m4 = 101
               self.request.sendall(str.encode(",".join([str(viteza), str(rafala), str(directie), str(tIn), str(uIn), str(tOut), str(uOut), str(tAer), str(tSol), str(lumina), str(m1), str(m2), str(m3), str(m4)])))
            if data1 == "Zona1":
               GPIO.output(pinZ1, GPIO.HIGH)
               GPIO.output(pinH, GPIO.HIGH)
               GPIO.output(pompaI, GPIO.HIGH)
               print("update Z1")
               updateirigareZ1()
            if data1 == "Zona2":
               GPIO.output(pinZ2, GPIO.HIGH)
               GPIO.output(pinH, GPIO.HIGH)
               GPIO.output(pompaI, GPIO.HIGH)
               print("update Z2")
               updateirigareZ2()
            if data1 == "Zona3":
               GPIO.output(pinZ3, GPIO.HIGH)
               GPIO.output(pinH, GPIO.HIGH)
               GPIO.output(pompaI, GPIO.HIGH)
               print("update Z3")
               updateirigareZ3()
            if data1 == "Zona4":
               GPIO.output(pinZ4, GPIO.HIGH)
               GPIO.output(pinH, GPIO.HIGH)
               GPIO.output(pompaI, GPIO.HIGH)
               print("update Z4")
               updateirigareZ4()
            if data1 == "Zona5":
               GPIO.output(pinZ5, GPIO.HIGH)
               GPIO.output(pinH, GPIO.HIGH)
               GPIO.output(pompaI, GPIO.HIGH)
               print("update Z5")
               updateirigareZ5()
            if data1 == "Zona6":
               GPIO.output(pinZ6, GPIO.HIGH)
               GPIO.output(pinH, GPIO.HIGH)
               GPIO.output(pompaI, GPIO.HIGH)
               print("update Z6")
               updateirigareZ6()
            if data1 == "uSettings":
               GPIO.output(pompaI, GPIO.HIGH)
               GPIO.output(pinH, GPIO.HIGH)
               GPIO.output(pinZ1, GPIO.HIGH)
               GPIO.output(pinZ2, GPIO.HIGH)
               GPIO.output(pinZ3, GPIO.HIGH)
               GPIO.output(pinZ4, GPIO.HIGH)
               GPIO.output(pinZ5, GPIO.HIGH)
               GPIO.output(pinZ6, GPIO.HIGH)
               print("update settings")
               updateSet()
               if auxSet == 2:
                  updateirigareZ1()
                  updateirigareZ2()
                  updateAuxiliary()
               if auxSet == 6:
                  updateirigareZ1()
                  updateirigareZ2()
                  updateirigareZ3()
                  updateirigareZ4()
                  updateirigareZ5()
                  updateirigareZ6()

            if data1 == "confortL1":
               GPIO.output(IS, GPIO.LOW)
               GPIO.output(DS, GPIO.LOW)
               treapta1 = 10
               tpornit1 = 0
               tnext1 = 0
               toprit1 = 0
               print("update M5")
               updatedata1()
            if data1 == "confortL2":
               GPIO.output(ID, GPIO.LOW)
               GPIO.output(DD, GPIO.LOW)
               treapta2 = 10
               tpornit2 = 0 
               tnext2 = 0
               toprit2 = 0
               print("update M2")
               updatedata2()
            if data1 == "confortL3":
               GPIO.output(IS2, GPIO.LOW)
               GPIO.output(DS2, GPIO.LOW)
               treapta3 = 10
               tpornit3 = 0
               tnext3 = 0
               toprit3 = 0
               print("update M3")
               updatedata3()
            if data1 == "confortL4":
               GPIO.output(ID2, GPIO.LOW)
               GPIO.output(DD2, GPIO.LOW)
               treapta4 = 10
               tpornit4 = 0
               tnext4 = 0
               toprit4 = 0
               print("update M4")
               updatedata4()
            if data1 == "auxFan":
               print("update Aux")
               updateAuxiliary()

        except IndexError:
            pass

##definitie repeat
def frun():
        try:
            updateTime()
            arduinoData()
            global ziua
            #print "doi"
            if ora == 0 and minut == 0 and ziua == 0:
               ziua = 1
               today = date.today()
               print(("Azi :", today))
               print(viteza, rafala, directie, tIn, uIn, tOut, uOut, tAer, tSol, lumina)
            if ora == 0 and minut == 1 and ziua == 1:
               ziua = 0
            threading.Timer(1, frun).start()
        except KeyboardInterrupt:
            GPIO.cleanup()
            print("iesire sistem 1")
            os.kill(os.getpid(), signal.SIGTERM)


def grun():
        try:
            if auxSet == 2:
               irigareZ1()
               irigareZ2()
               fanaction()
               heataction()
               lightaction()
               humiaction()
            if auxSet == 6:
               irigareZ1()
               irigareZ2()
               irigareZ3()
               irigareZ4()
               irigareZ5()
               irigareZ6()
            #if GPIO.input(27) == 0:
            #   print "J2 LOW"
            #   out = subprocess.Popen(["cp -R /root/hostapd.conf /etc/hostapd/hostapd.conf && cp -R /root/interfaces /etc/network/interfaces"], stdout=subprocess.PIPE, shell=True)
            #   time.sleep(1)
            #   out2 = subprocess.Popen(["/bin/systemctl enable dnsmasq && /bin/systemctl enable hostapd && /sbin/reboot"], stdout=subprocess.PIPE, shell=True)

            #print "hello 10"
            #time.sleep(20)
            #if (GPIO.input(pinZ1) == 0 and GPIO.input(pompaI) == 0):
            #   print "irigare Z1"
            #if (GPIO.input(pinZ2) == 0 and GPIO.input(pompaI) == 0):
            #   print "irigare Z2"
            #if (GPIO.input(pinH) == 0):
            #   print "bazin 1"
            #if (GPIO.input(pompaI) == 0):
            #   print "pompa apa pornita"
            threading.Timer(10, grun).start()
        except KeyboardInterrupt:
            GPIO.cleanup()
            print("exit sistem grun")
            os.kill(os.getpid(), signal.SIGTERM)


def mrun():
        try:
            Motor1()
            Motor2()
            Motor3()
            Motor4()
            threading.Timer(1, mrun).start()
        except KeyboardInterrupt:
            GPIO.cleanup()
            print("exit sistem 1")
            os.kill(os.getpid(), signal.SIGTERM)


frun()
grun()
mrun()
updateSet()
time.sleep(2)

updatedata1()
updatedata2()
updatedata3()
updatedata4()

if auxSet == 2:
   updateirigareZ1()
   updateirigareZ2()
   updateAuxiliary()
if auxSet == 6:
   updateirigareZ1()
   updateirigareZ2()
   updateirigareZ3()
   updateirigareZ4()
   updateirigareZ5()
   updateirigareZ6()
###Setari Socket

class ThreadedTCPServer(socketserver.ThreadingMixIn, socketserver.TCPServer):
    pass

def socS():
    try:
        ThreadedTCPServer.allow_reuse_address = True
        server = ThreadedTCPServer(("0.0.0.0", 3333), ThreadedTCPRequestHandler)
        ip, port = server.server_address
        server_thread = threading.Thread(target=server.serve_forever)
        server_thread.daemon = True
        server_thread.start()
        server.serve_forever()
        server.shutdown()
        server.server_close()
    except KeyboardInterrupt:
        GPIO.cleanup()
        print("exit sistem")
        os.kill(os.getpid(), signal.SIGTERM)
socS()
