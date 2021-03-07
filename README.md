# SilentBot
Simple Discord bot to forward chat from channel to channel using chatter and listener instances

# How to use
## Requirement
- PHP >=7.4
- Composer
- For windows, add php folder path to system variables `path`, follow this [guide](https://www.computerhope.com/issues/ch000549.htm)

## How to install
1. Download [here](https://github.com/nicholaskevs/SilentBot/archive/master.zip)
2. Extract
3. Install dependency with `composer`
4. Go to `config` folder
5. Change `cons_env-template.php` into `cons_env.php`
6. Fill in `cons_env.php` with your data
7. Run `20200302-Initial schema.sql` in `schema` folder (you can skip step 6 and 7 if you are using db, otherwise you can skip this step)
8. Change `forward-template.txt` into `forward.txt`
9. Fill in `forward.txt` with channel ids (format is `from_channel_id,to_channel_id`)
10. Run `php silentbot.php` or open `silentbot.bat` for windows
