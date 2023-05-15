@vite(['resources/js/main.js'])
<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<main id='app'>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Custom Email</h5>
            <form method="POST" action="/sendemail">
                @csrf
                <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" v-model="name" placeholder="Enter victim name">
                        </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" v-model="email" placeholder="Enter email">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" name="message" id="message" v-model="message" rows="3" placeholder="Enter message"></textarea>
                </div>
                <button type="submit"  class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>     
</body>
</html>
