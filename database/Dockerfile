FROM mariadb:latest

# Set environment variables for MariaDB
ENV MYSQL_ROOT_PASSWORD=admin@123
ENV MYSQL_DATABASE=php_travel_express
ENV MYSQL_USER=root

# Copy the SQL file to the Docker container
COPY php_travel_express.sql /docker-entrypoint-initdb.d/

EXPOSE 3306