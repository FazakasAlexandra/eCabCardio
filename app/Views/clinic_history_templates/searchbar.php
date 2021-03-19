<div class="consult-history-searchbar">
  <form class="clinic-history-form" action="/ecabcardio/public/history/search" method="GET">
    <div class="wraper">
      <div class="inner-wraper">
        <label for="date">From</label>
        <input class="form-control" type="date" name="date_from" value=<?php echo $dateFrom?>>
      </div>
      <div class="inner-wraper">
        <label for="date">to</label>
        <input class="form-control" type="date" name="date_to" value=<?php echo $dateTo?>>
      </div>

      <button class="button-blue-dark">Search</button>
    </div>
  </form>

  <form action="/ecabcardio/public/history" method="GET">
    <button class="button-blue-dark" id="show-all">Show all</button>
  </form>
</div>