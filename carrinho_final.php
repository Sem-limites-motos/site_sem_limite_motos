<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .cart-summary {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .cart-items {
            background-color: #fff;
            margin: 20px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cart-items ul {
            list-style: none;
            padding: 0;
        }

        .cart-items li {
            margin-bottom: 10px;
        }

        .cart-items li span {
            float: right;
        }

        .discount-input {
            text-align: center;
            margin-top: 20px;
        }

        .voucher-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .voucher-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .voucher-button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .voucher-button:hover {
            background-color: #45a049;
        }

        #sumir{
            display: none;
        }
    </style>
</head>
<body>
    <div class="cart-summary">
        <h2>Resumo do Carrinho</h2>
        <form action="" method="post">
        <p>Total:  <span id="total" >0</span></p>
        </form>
        <button onclick="toggleItems()">Mostrar/Esconder Itens</button>
        <button onclick="addItem()">Adicionar Item</button>
        <button onclick="removeItem()">Remover Item</button>
    </div>

    <div class="cart-items" id="cart-items">
        <form action="" method="post">
            <h2>Seu Carrinho</h2>
            <ul id="items-list" name="total">
                <!-- Itens serão adicionados dinamicamente aqui -->
            </ul>
        </form>

    </div>
    <div class="voucher-container">
        <h2>Entrada de Voucher para Desconto </h2>
        <form action="./sql/db_voucher.php" method="post">
            <input type="text" class="voucher-input" name="voucher" placeholder="Digite o voucher">
            <input type="text" id="sumir" class="voucher-input" name="total" value="65.0" placeholder="Total:" >

            <button type="submit" class="voucher-button">Enviar</button>
        </form>
    </div>

    <script>
        let itemsVisible = true;

        function toggleItems() {
            const cartItems = document.getElementById('cart-items');
            itemsVisible = !itemsVisible;
            cartItems.style.display = itemsVisible ? 'block' : 'none';
        }

        function addItemToCart(product, price) {
            const itemsList = document.getElementById('items-list');
            const total = document.getElementById('total');

            const listItem = document.createElement('li');
            listItem.textContent = `${product} - $${price}`;
            itemsList.appendChild(listItem);

            const currentTotal = parseFloat(total.textContent);
            total.textContent = (currentTotal + price).toFixed(2);
        }

        function addItem() {
            addItemToCart('Novo Produto', 25); // Adiciona um novo item com preço de exemplo
        }

        function removeItem() {
            const itemsList = document.getElementById('items-list');
            const total = document.getElementById('total');

            const lastItem = itemsList.lastElementChild;
            if (lastItem) {
                const price = parseFloat(lastItem.textContent.split('$')[1]);
                itemsList.removeChild(lastItem);

                const currentTotal = parseFloat(total.textContent);
                total.textContent = (currentTotal - price).toFixed(2);
            }
        }

        function applyDiscount() {
            const voucher = document.getElementById('voucher').value;
            // Lógica para aplicar o desconto com o voucher (simulada)
            // Você pode adicionar sua própria lógica de desconto aqui
            alert(`Desconto aplicado com sucesso usando o voucher: ${voucher}`);
        }

        // Adicionando itens de exemplo ao carrinho
        addItemToCart('Produto 1', 20);
        addItemToCart('Produto 2', 30);
        addItemToCart('Produto 3', 15);
    </script>
</body>
</html>
