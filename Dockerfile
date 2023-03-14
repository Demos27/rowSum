FROM php:8.1
COPY App /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["php", "./Src/cli.php", "1 5 8 10 -4 kj"]

# docker build . -t php_image
# docker run --name php_test --rm php_image