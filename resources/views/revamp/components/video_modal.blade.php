<style>
.bs-example {
        margin: 20px;
    }

    .modal-dialog iframe {
        margin: 0 auto;
        display: block;
    }

    .modal-dialog {
        max-width: 800px;
        /* Adjust the width as needed */
    }

    /* Center the modal horizontally */
    .modal-dialog-centered {
        display: flex;
        align-items: center;
        min-height: calc(100% - 3.5rem);
    }
</style>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">YouTube Video</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="videoFrame" class="embed-responsive-item" width="560" height="315"
                        src="" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
