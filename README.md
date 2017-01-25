# Oxygen

**Version: 1.0.0-alpha2**

A PHP program aimed to alert (distracted) students when their service in the canteen arrives, with a SMS on their smartphones.

This project aims to provide a web interface allowing to indicate the class which must pass to the self / canteen and to send a 
message to the students of the concerned class.

You can retrieve the data of the current passage with the file actualPassage.json in data folder.

# Installation

To facilitate this step, we hope to provide you with a tool (called Alber) for automated installation.
For the moment, you must manually configure and install Oxygen.

## Database

Oxygen uses an authentication system with a database.
You must create it manually by pasting this [code](https://gist.github.com/QwertyThinkNo/0bc18a658bbc97abdc11e9c83c164a10)
 into the termial SQL of your server

After this, You must edit the `app` file in `bootstrap` file and insert and change `YOUR_DB_PASSWORD` to your database password
and `YOUR_DB_USER` to your database user.

And that's all !

## Current Passage

You can find all the informations related to the current passage in the file `actualPassage.json` in `data` folder.

This file is automatically updated at each class change.

# Features

Oxygen has the following features:

    • Passage order list (configs/passageList.ini)
    • Actual passage data (data/actualPassage.json)
    • Authentification system
    • Material design-based UI

# Warning !

Currently, the following functions are absent from Oxygen:

    • "Special day" when passage order is changed for only one day.
    • Settings.ini support.
    • Multi-langs support (Only in French now :( ).
    • Admin Zone doesn't work fine. (WIP)

### Changelog

    • Graphical User Interface Enhancements (I added smileys).
    • Added the changelog section in the "About" section.
    • Added Authentification system.
    