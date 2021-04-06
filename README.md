# KitchenInventory
A system to manage inventories levels of your kitchen or other household goods with bar codes.  First time you scan a new item it will attempt to pull that information for you, fill in what it can, let you fill in the rest, then saves that item locally for next time.  From there you simple put the system into add mode and start scanning in your items after shoping.  After that leave it in remove mode and as you scan the items you use they will be deducted from the inventory.  Now you know what you have and deciding what to make for dinner or what to get when you go shopping is a breeze!

## Requirements
 * Mysql (MariaDB works well)
 * PHP (built on 7.0)
 * PHP7.0-fpm
 * PHP7.0-mysql
 * PHP7.0-mysqli
 * PHP7.0-curl
 * nginx
