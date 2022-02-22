## Installation

1. `git clone "https://github.com/tanweikang02/SDP.git"`
2. `git remote add origin "https://github.com/tanweikang02/SDP/main"`
3. `git branch --set-upstream-to=origin/<branch>`
4. `git pull`

### Useful Git Commands

- `git add`
- `git commit`
- `git push`
- `git stash`

## Progress
- Backend Logic for PayPal almost done. Waiting for checkout page being done and connect to this PayPalController.

### In order to make PayPal integration works correctly
1. Download cacert.pem from https://curl.se/docs/caextract.html
2. Save it anywhere on your file system, say "C:\cert\"
3. Search for a file called php.ini (it's a configuration file for the PHP you installed in your system)
4. In php.ini, find a section called curl, and put in the cert location in like this: (better put also in openssl)    
     
[curl]     
curl.cainfo = "C:\cert\cacert.pem"      
      
[openssl]    
openssl.cafile = "C:\cert\cacert.pem"
**Note**: Remove the semicolon ';' in the beginning of the line to uncomment it (both curl and openssl)
     
5. Rerun the server - run `php artisan serve` again.     
