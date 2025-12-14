<!DOCTYPE html>  
<html lang="en">  
  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Login</title>  
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
    <link href="<?php echo base_url(''); ?>admin/css/sb-admin-2.min.css" rel="stylesheet">  
   
</head>  
  
<body>  
    <div class="container">  
        <!-- Outer Row -->  
        <div class="row justify-content-center">  
  
            <div class="col-xl-10 col-lg-12 col-md-9">  
  
                <div class="card o-hidden border-0 shadow-lg my-5">  
                    <div class="card-body p-0">  
                        <!-- Nested Row within Card Body -->  
                        <div class="row">  
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>  
                            <div class="col-lg-6">  
                                <div class="p-5">  
                                    <div class="text-center">  
                                        <h1 class="h4 text-gray-900 mb-4">Login Jemaat GKS Waikabubak</h1>  
                                    </div>  
                                    <?php if ($this->session->flashdata('error')): ?>  
                                        <div class="alert alert-danger" role="alert">  
                                            <?php echo $this->session->flashdata('error'); ?>  
                                        </div>  
                                    <?php endif; ?>  
                                    <?php echo form_open('user/auth/authenticate'); ?>  
                                    <div class="form-group">  
                                        <label for="email">Username</label>  
                                        <input type="text" class="form-control form-control-user" id="email" name="email" required>  
                                    </div>  
                                    <div class="form-group">  
                                        <label for="password">Password</label>  
                                        <input type="password" class="form-control form-control-user" id="password" name="password" required>  
                                    </div>  
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>  
                                    <hr>  
                                    <?php echo form_close(); ?>  
                                </div>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</body>  
  
</html>  
