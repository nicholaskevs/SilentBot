# SilentBot
Simple Discord bot to forward chat from channel to channel

# How to use
## Requirement
- PHP >=7.4
- For windows, add php folder path to system variables `path`, follow this [guide](https://www.computerhope.com/issues/ch000549.htm)

## How to install
1. Download [here](https://github.com/nicholaskevs/Salien-Launcher/archive/master.zip)
2. Extract
3. Go to `config` folder
3. Change `cons_env-template.php` into `cons_env.php`
4. Fill in `cons_env.php` with your data
5. Run `20200302-Initial schema.sql` in `schema` folder (you can skip step 6 and 7 if you are using db, otherwise you can skip this step)
6. Change `forward-template.txt` into `forward.txt`
7. Fill in `forward.txt` with channel ids (format is `from_channel_id,to_channel_id`)
8. Run `php silentbot.php` or open `silentbot.bat` for windows
