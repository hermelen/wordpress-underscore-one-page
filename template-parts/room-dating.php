<?php
$room_id = get_the_ID();

global $wpdb;
$resas = $wpdb->get_results(
  "SELECT id
  FROM {$wpdb->prefix}resa
  WHERE room_id = $room_id"
);

$booked_days = [];
for ($i=0; $i < count($resas) ; $i++) {
  $resa_id = $resas[$i]->id;
  $booked_days[$i] = $wpdb->get_results(
    "SELECT thedate
    FROM {$wpdb->prefix}resa_day
    WHERE resa_id = $resa_id
    ORDER BY thedate"
  );
};

for ($i=0; $i < count($booked_days) ; $i++) {
  $first = reset($booked_days[$i]);
  $last = end($booked_days[$i]);
  $title = "réservé";
  $booked_days[$i] = [$first, $last, $title];
};

$booked_days=json_encode($booked_days); ?>

<script type="text/javascript">
  var bookedDays = <?= $booked_days ?>;
  console.log('template-parts/room-dating.php', bookedDays);
</script>
