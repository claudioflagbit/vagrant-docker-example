Vagrant.configure("2") do |config|
  config.vm.synced_folder ".", "/var/www/html"

  config.vm.define "project-mysql" do |a|
    a.vm.provider "docker" do |d|
      d.image = "mysql:5.5"
      d.name = "project-mysql"
      d.vagrant_machine = "dockerdocker.dev"
      d.expose = ["3306-3306"]
      d.env = {
        MYSQL_ROOT_PASSWORD: "root",
        MYSQL_DATABASE: "project",
        MYSQL_USER: "root",
        MYSQL_PASSWORD: "root",
      }
      d.build_args = ["--tag=mysql-docker"]
    end
  end
  
  config.vm.define "project-php" do |a|
    a.vm.provider "docker" do |d|
      d.build_dir = "./.docker/php-ubuntu/"
      d.name = "project-php"
      d.expose = ["9000-9000"]
      d.vagrant_machine = "dockerdocker.dev"
      d.link("project-mysql:project-mysql")
      d.build_args = ["--tag=project-php"]
      d.create_args = ["--volume=/var/www/html"]
      d.remains_running = false
    end
  end
  
  config.vm.define "project-apache" do |a|
    a.vm.provider "docker" do |d|
      d.build_dir = "./.docker/apache-ubuntu/"
      d.name = "project-apache"
      d.ports = ["80:80", "443:443"] # expose to the host
      d.vagrant_machine = "dockerdocker.dev"
      d.link("project-php:project-php")
      d.build_args = ["--tag=project-apache"]
      d.create_args = ["--hostname=dockerdocker.dev"]
    end
  end
end
