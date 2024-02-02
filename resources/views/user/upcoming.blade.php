<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container">
        <h1 class="text-center">Upcoming Manga</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody id="contents">
                
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetchData();

            function fetchData() {
                fetch('/user/pendingdata')
                    .then(response => response.json())
                    .then(data => {
                        updateTable(data.data);
                    })
                    .catch(error => console.error('Error fetching data:', error));
            }

            function updateTable(data) {
                const dataBody = document.getElementById('contents');
                dataBody.innerHTML = '';

                data.forEach(item => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${item.title}</td>
                        <td>${item.author}</td>
                    `;
                    dataBody.appendChild(row);
                });
            }
        });
    </script>

</body>
</html>