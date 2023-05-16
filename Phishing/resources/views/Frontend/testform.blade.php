@vite(['resources/js/main.js'])
<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: lightblue;
        }
    </style>
</head>
<body>
<main id='app'>
<h5 class="mb-5" style="font-size: 30px; font-family:Georgia, 'Times New Roman', Times, serif; font-weight: bold;"><center>Please take the survey to win your £150 Amazon Vocher</center></h5>
<div class="container mt-5" style="font-family:Georgia;">

            <form method="POST" action="/testform">
                @csrf
                <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" v-model="name" >
                        </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" v-model="email" >
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Which is your current job?</label>
                    <input class="form-control" name="job" id="job" v-model="job" ></input>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Which city do you live in?</label>
                    <input class="form-control" name="city" id="city" v-model="city" ></input>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Which is your favourite color?</label>
                    <input class="form-control" name="color" id="color" v-model="color" ></input>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">What is your favourite sport?</label>
                    <input class="form-control" name="sport" id="sport" v-model="sport" ></input>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">What is your Hobby?</label>
                    <input class="form-control" name="hobby" id="hobby" v-model="hobby" ></input>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>     
</body>
</html>
