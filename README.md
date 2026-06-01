## Databse schema design 

### 1. User
    id : int (primary key)
    email : varchar(255) (unique)
    password : varchar(255)
    address : varchar(255)
    phone : varchar(255)
    is_active : boolean
    profile_image : varchar(255)

### 2. Category
    id : int (primary key)
    name : varchar(255)
    description : text

### 3. Product
    id : int (primary key)
    name : varchar(255)
    price : float
    description : text
    image_url : varchar(255)
    stock_quantity : int

### 4. Order
    id : int (primary key)
    user_id : int (foreign key)
    total_price : float
    order_date : datetime
    status : string
    payment_method : string

### 5. OrderDetail
    id : int (primary key)
    order_id : int (foreign key)
    product_id : int (foreign key)
    quantity : int
    price : float

### 6. Payment
    id : int (primary key)
    order_id : int (foreign key)
    payment_date : datetime
    amount : float
    payment_method : varchar(255)
    status : boolean