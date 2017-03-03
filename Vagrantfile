# All Vagrant configuration is done below. See https://docs.vagrantup.com.
Vagrant.configure("2") do |config|
	# OS
	config.vm.box = "ubuntu/xenial64"

	# Create a private network
	config.vm.hostname = "pipeline-vgt"
	config.vm.network "private_network", ip: "192.168.68.68"

	# Synced folder with the VM
	config.vm.synced_folder ".", "/vagrant"

	# VM custom settings
	config.vm.provider "virtualbox" do |vb|
		vb.name = "pipeline-vgt"
		vb.customize ["modifyvm", :id, "--memory", "2048"]
		vb.customize ["modifyvm", :id, "--cpus", "1"]
		vb.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
		vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
	end  

	# Enable provisioning with a shell script.
	config.vm.provision "shell", path: "_dev/vagrant.provision.sh", keep_color: true
end
