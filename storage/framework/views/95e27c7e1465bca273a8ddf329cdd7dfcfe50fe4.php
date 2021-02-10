


<?php $__env->startSection('content'); ?>

    <section class="full-height new-present-section">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="presentation-info">
                        <div class="info-text">
                            <p>
                                If you would like to add your new templates, please, upload them
                                into the platform and our specialists will contact you with opportunities and prices
                            </p>
                        </div>
                        <div class="presentation-action">
                            <button class="feedback_btn" data-type="upload">Upload</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="presentation-info">
                        <div class="info-text">
                            <p>
                                If you want to create something new, If you want to include designer’s idea,
                                If you want to discuss something, <br> Please, contact us
                            </p>
                        </div>
                        <div class="presentation-action">
                            <button data-type="contact">Contact</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="feedback-form">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-9">
                        <form class="presentation-form" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <div class="form-title d-flex justify-content-center mb-4 mt-3" style="border-bottom: 1px solid #cdcdcd;">
                                        <h3>Contact Us!</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userName">Name</label>
                                        <input type="text" class="form-control" id="userName" name="name" value="<?php echo e(auth()->user()->name ?? ''); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userEmail">E-mail</label>
                                        <input type="text" class="form-control" id="userEmail" name="email" value="<?php echo e(auth()->user()->email ?? ''); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row template-row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="userFile">Template (file)</label>
                                        <input type="file" id="userFile" name="file" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="userMessage">Your message</label>
                                        <textarea name="msg" id="userMessage" cols="30" rows="6" placeholder="Message" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <div class="form-actions d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary btn-lg mr-2" id="sendFeedback">Send</button>
                                        <button type="button" class="btn btn-danger btn-lg cancelBtn">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.custom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prema\resources\views/custom/new-presentation.blade.php ENDPATH**/ ?>