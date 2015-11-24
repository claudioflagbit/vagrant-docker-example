Vagrant.configure("2") do |config|
  config.vm.synced_folder ".", "/var/www/html"

  config.vm.define "project-mysql" do |a|
    a.vm.provider "docker" do |d|
      d.image = "mysql:5.6"
      d.name = "project-mysql"
      d.expose = ["3306-3306"]
      d.env = {
        MYSQL_ROOT_PASSWORD: "root",
        MYSQL_DATABASE: "project",
        MYSQL_USER: "user",
        MYSQL_PASSWORD: "password",
      }
    end
  end
  
  config.vm.define "project-php" do |a|
    a.vm.provider "docker" do |d|
      d.build_dir = "./.docker/php-ubuntu/"
      d.name = "project-php"
      d.expose = ["9000-9000"]
      d.link("project-mysql:project-mysql")
      d.build_args = ["--tag=project-php"]
    end
  end
  
  config.vm.define "project-apache" do |a|
    a.vm.provider "docker" do |d|
      d.build_dir = "./.docker/apache-ubuntu/"
      d.name = "project-apache"
      d.ports = ["80:80", "443:443"]
      d.link("project-php:project-php")
      d.build_args = ["--tag=project-apache"]
    end
  end
end
