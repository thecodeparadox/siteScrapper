<div class="search-result">
    <?php if( empty($this->craiglistJobs) ): ?>
        <div class="alert-danger alert">No Results found.</div>
    <?php else: ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= count($this->craiglistJobs) . ' results found.' ?></h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Links</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($this->craiglistJobs as $job): ?>
                        <tr>
                            <td><a href="<?= $job['href']; ?>"><?php echo $job['text']; ?></a></td>
                            <td><?= $job['datetime']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>