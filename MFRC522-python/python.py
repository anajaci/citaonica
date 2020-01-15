#!/usr/bin/env python
# -*- coding: utf8 -*-

from twitter import *

import RPi.GPIO as GPIO
import MFRC522
import signal
import urllib2
import urllib
import json
import datetime

app_key = "my5NeKaeuNH9tpWy2ow2kVf9t"
app_secret = "713FpTfdHKVpbLHD4HkEU5c141ywVuG2c9cer7UfrwtlugoZzr"
oauth_token = "870312122655412225-8tzZEuAYV4sAlzb6rVagPxXxiqAw0Ev"
oauth_token_secret = "Is84MRhvSkefw6FKHw66MSgY6S5HecA7oAsX7skAcEjis"



continue_reading = True

# Capture SIGINT for cleanup when the script is aborted
def end_read(signal,frame):
    global continue_reading
    print "Ctrl+C captured, ending read."
    continue_reading = False
    GPIO.cleanup()

# Hook the SIGINT
signal.signal(signal.SIGINT, end_read)

# Create an object of the class MFRC522
MIFAREReader = MFRC522.MFRC522()

# Welcome message
print "Welcome to the MFRC522 data read example"
print "Press Ctrl-C to stop."

# This loop keeps checking for chips. If one is near it will get the UID and authenticate
while continue_reading:
    
    # Scan for cards    
    (status,TagType) = MIFAREReader.MFRC522_Request(MIFAREReader.PICC_REQIDL)

    # If a card is found
    if status == MIFAREReader.MI_OK:
        print "Card detected"
    
    # Get the UID of the card
    (status,uid) = MIFAREReader.MFRC522_Anticoll()

    # If we have the UID, continue
    if status == MIFAREReader.MI_OK:

        # Print UID
        print "Card read UID: "+str(uid[0])+","+str(uid[1])+","+str(uid[2])+","+str(uid[3])
        mydata=str(uid[0])+""+str(uid[1])+""+str(uid[2])+""+str(uid[3])
        print mydata
        url= 'http://172.20.222.212:80/Citaonica/citaonica.php?mydata={0}'.format(mydata) #slanje nivoa vode
        urllib.urlopen(url)
    
        # This is the default key for authentication
        key = [0xFF,0xFF,0xFF,0xFF,0xFF,0xFF]
        
        # Select the scanned tag
        MIFAREReader.MFRC522_SelectTag(uid)

        # Authenticate
        status = MIFAREReader.MFRC522_Auth(MIFAREReader.PICC_AUTHENT1A, 8, key, uid)

        # Check if authenticated
        if status == MIFAREReader.MI_OK:
            MIFAREReader.MFRC522_Read(8)
            MIFAREReader.MFRC522_StopCrypto1()
        else:
            print "Authentication error"

    brojac = 0

	if (mydata=='101703943'):
		data = {}
		data["idstudenta"]= '101703943'
		data["ime"]='Ana'
		data["prezime"]='Jacimovic'
		data["brojindeksa"]='1063/16'
		data["vreme"]='CURRENT_TIMESTAMP'

        brojac += 1

		print json.dumps(data)
		req = urllib2.Request("https://citaonica-jaci.c9users.io/rest/citaonica.json", data=json.dumps(data),
                          headers={"Content-Type": "application/json"})
		print urllib2.urlopen(req).read()
        status="Ana Jacimovic je usla u citaonicu | Broj studenata u citaonici: {}"
		twitter.update_status(status.format(brojac)) 

	if (mydata=='11810420150'):
		data = {}
		data["idstudenta"]= '11810420150'
		data["ime"]='Jelena'
		data["prezime"]='Bukarica'
		data["brojindeksa"]='725/12'
		data["vreme"]='CURRENT_TIMESTAMP'

        brojac += 1

		print json.dumps(data)
		req = urllib2.Request("https://citaonica-jaci.c9users.io/rest/citaonica.json", data=json.dumps(data),
                          headers={"Content-Type": "application/json"})
		print urllib2.urlopen(req).read()

		twitter.update_status(status='Jelena Bukarica je usla u citaonicu')

	