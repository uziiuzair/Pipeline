# About Vagrant

> Vagrant is roughly a virtual machine wrapper. It allows anyone to run a virtual machine reproducing the production environment with simple commands. Although helpful, this is not mandatory.

## Prerequisites
To run Vagrant, you will need Virtualbox (or another virtualization software) installed. 
See [https://www.vagrantup.com/](https://www.vagrantup.com/) for more info.

## System info
- **OS :** Ubuntu 16.04 LTS Xenial64
- **VM name :** pipeline-vgt
- **IP :** 192.168.68.68 

## Setup
The config file is `Vagrantfile` in the root folder. This file contains the basic configuration of our virtual machine. This file launches the VM with the selected OS (*or "box"*) and ends by executing a configuration script `vagrant.provision.sh` located in `_dev/`. This provision file will handle the installation of software used in this project such as Apache2, PHP 7.0 and MySQL.

Files in the project folder and on the virtual machine are automatically synced via `rsync`.

## Run
All commands are executed in the project folder.

### Start the virtual machine
`vagrant up`

### Stop the virtual machine
> **CAUTION :** this command stops the VM, destroys its drives and free its allocated resources on the host. If you made changes to config files or the like, please make a copy somewhere safe if you intend to keep them.

`vagrant destroy`

### SSH
`vagrant ssh`

## Testing
To test if the VM is up and the project running, simply open your browser and enter the IP specified in the System info. If you want, you can also add that IP to your ´hosts´ file with a more readable name like `pipeline.vgt`. You can then access the application seamlessly through [http://pipeline.vgt](http://pipeline.vgt).



