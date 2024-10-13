<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Date#</th>
      <th scope="col">Check #</th>
      <th scope="col">Description</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach ($transactions as $key => $transaction) {
    ?> 
    
    <tr>
    <th scope="row"><?= formatDate($transaction['date'])?></th>
    <th scope="row"><?= $transaction['checkName']?></th>
    <th scope="row"><?= $transaction['descriptionn']?></th>
    <th scope="row">
        <?php if ($transaction['amount'] < 0): ?>
          <span style="color:red">
          <?= formatDollarAmount($transaction['amount'])?>
        </span>
        <?php  elseif ($transaction['amount'] > 0): ?>
          <span style="color:green">
          <?= formatDollarAmount($transaction['amount'])?>
        </span>
        <?php else: ?>
          <span style="color:red">
          <?= formatDollarAmount($transaction['amount'])?>
        </span>
        <?php endif; ?>
     </th>
    </tr>
    <?php } ?>
    <tr>
      <th colspan="3">Total Income</th>
      <td ><?=formatDollarAmount($total['totalIncome'])?></td>
    </tr>
    <tr>
      <th colspan="3">Total Expense</th>
      <td ><?=formatDollarAmount($total['totalExpense'])?></td>
    </tr>
    <tr>
      <th colspan="3">Net Total</th>
      <td ><?=formatDollarAmount($total['netTotal'])?></td>
    </tr>
   
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>