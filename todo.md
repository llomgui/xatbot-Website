# TODO list

### Features
* [ ] Share a bot between users, with roles?

### Pages
* [ ] Landing page
* [ ] Chat logs
* [ ] Chat statitics (Users online, Messages sent last 24h, Commands sent last 24h, Actions last 24h)
* [ ] Commands (option GET chat/chatid to get minranks for a given chat)
* [ ] Get Premium (Videos in different languages)
* [ ] Ocean Staff (With ranks)
* [ ] Servers status
* [ ] Userinfo

### Bot lists
* [ ] Autoban - new table in database
* [ ] Custom commands - new table in database
* [x] Links filter - new table in database

### Bot pages
* [ ] Hangman words
* [ ] Typerace sentences
* [ ] Moderation (on/off) - add to general settings

### Staff panel
* [ ] Add userslist, search user via regname/xatid/username/email, view user and its bots owned, change his roles (Only admin)
* [ ] Add botslist, search bot via chat/chatid, be able to edit a bot to help users, change owner
* [ ] Add commandslist, be able to add/edit a command (Only admin)
* [ ] Add botmessages, be able to add/edit a message (Only admin)
* [ ] Add serverslist, be able to add/edit a server (Only admin)
* [ ] Add ticketslist, be able to reply/close tickets

### Translation system
[Source1](https://github.com/caouecs/Laravel-lang)
[Source2](https://github.com/Waavi/translation)
* [ ] Panel to manage languages and translations
OR doing it manually:
[Source3](https://laravel.com/docs/5.4/localization)
* [ ] Add language column into users table
* [ ] Dropdown menu to change language

### Userinfo
* [ ] Import old table to the new database

### Migration old to new website
Users will have to register again to be sure their information are 100% clean.
A mail will be sent to them to verify their email.
Once they clicked on the link sent, they will have to create a bot (need to have the chat password to confirm they own the chat).
All data (bot settings, staff list, snitch list, autotemp list, bot's powers, responses, badwords, links, hangman words, aliases) will be insert in the new database, they will have to re-do their minranks and bot's messages...
