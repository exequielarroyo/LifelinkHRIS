<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<?php
if (empty($_SESSION['hris_id'])) {
    header('Location: login');
}
?>

<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-building"></i>Select Company
            </h1>
        </div>
    </div>
    <!-- END Datatables Header -->
    
    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2><strong>Company</strong> List</h2>
        </div>
        <div class="table-responsive">
            <table id="company-management" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Company Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($db, "SELECT * FROM tbl_companies");
                    while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="payroll-registry?<?= md5('id') . '=' . md5($row['ID']) ?>" data-toggle="tooltip" title="View" class="btn btn-primary">Payroll Timesheet Cutoff</a>
                                </div>
                            </td>
                            <td><?= $row['company_name'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<style>
    .table-responsive i {
    font-family: "Open Sans", sans-serif;
}
</style>


<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/tablesDatatables.js"></script>
<script>
    $(function() {
        TablesDatatables.init();
    });
</script>

<?php include 'inc/template_end.php'; ?>