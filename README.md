
# API for restaurant application and solved three problems
        lumen 8 (Laravel Componenet)

## Install
    composer update

- create your database and put the configurations in .env file then run:

    
        php artisan migrate
        php artisan db:seed
    
## Run the app

     php -S localhost:8000 -t public   

# REST API

## Create a delivery order

### Request

`POST /order/`

    {
        "type":1,
        "items":[1,2],
        "delivery_fees":45,
        "customer_name":"Kyrillos",
        "customer_phone_number":"0123456789",
    }

### Response
    Status: 200 OK
    {
        "message": "Order has been placed successfully"
    }


## Create a dinein order

### Request

`POST /order/`

    {
        "type":2,
        "items":[1,2],
        "service_charge":45,
        "table_number": "1",
        "waiter_name":"0123456789"
    }

### Response
    Status: 200 OK
    {
        "message": "Order has been placed successfully"
    }


## Create a takeaway order

### Request

`POST /order/`

    {
        "type":3,
        "items":[1,2],
    }

### Response
    Status: 200 OK
    {
        "message": "Order has been placed successfully"
    }