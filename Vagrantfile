Vagrant.configure("2") do |config|
  config.vm.synced_folder ".", "/var/www/html"

  config.vm.define "mysql-docker" do |a|
    a.vm.provider "docker" do |d|
      d.image = "mysql:5.5"
      d.name = "mysql-docker"
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
  
  config.vm.define "php-docker" do |a|
    a.vm.provider "docker" do |d|
      d.build_dir = "./.docker/php-ubuntu/"
      d.name = "php-docker"
      d.expose = ["9000-9000"]
      d.vagrant_machine = "dockerdocker.dev"
      d.link("mysql-docker:mysql-docker")
      d.build_args = ["--tag=php-docker"]
      d.create_args = ["--volume=/var/www/html"]
      d.remains_running = false
    end
  end
  
  config.vm.define "apache-docker" do |a|
    a.vm.provider "docker" do |d|
      d.build_dir = "./.docker/apache-ubuntu/"
      d.name = "apache-docker"
      d.ports = ["80:80", "443:443"] # expose to the host
      d.vagrant_machine = "dockerdocker.dev"
      d.link("php-docker:php-docker")
      d.build_args = ["--tag=apache-docker"]
      d.create_args = ["--hostname=dockerdocker.dev"]
    end
  end
end
