<!-- Booking Form Modal -->
<div id="booking-modal" class="modal">
  <div class="modal-inner">
    <form method="post" novalidate>
      <header>
        <h3>Book Appointment</h3>
        <a class="modal-close" onclick="F1.Modal.close(this,event)">Close X</a>
      </header>
      <hr>
      <main>
        <p class="field required" data-type="Select">
          <label>Client</label>
          <select 
            name="clientid" 
            data-locale="en" 
            data-search="true" 
            data-placeholder="- Select a client -"
            data-value="0691234321">
            <?php foreach( $cal->clients as $c ): $lbl = "{$c->name}<small> - {$c->cell}</small>"; ?>
            <option value="<?=$c->cell?>" title="<?=$lbl?>"><?="{$c->name} - {$c->cell}"?></option>
            <?php endforeach; ?>
          </select>
        </p>
        <p class="field required" data-type="Select">
          <label>Treatment</label>
          <select 
            name="treatmentid" 
            data-locale="en" 
            data-search="true" 
            data-placeholder="- Select a treatment -">
            <?php foreach( $cal->treatments as $treatment ): ?>
            <option value="<?=$treatment->id?>"><?=$treatment->short_desc?></option>
            <?php endforeach; ?>
          </select>          
        </p>
        <div class="row" style="gap:1rem;margin-top:1rem">
          <div class="col" style="flex:1.34">
            <p class="field required" data-type="Select">
              <label>Therapist</label>
              <select 
                name="therapistid" 
                data-locale="en" 
                data-search="true" 
                data-placeholder="- Select a therapist -">
                <?php foreach( $cal->therapists as $t ): $lbl = "{$t->name}<small> - {$t->cell}</small>"; ?>
                <option value="<?=$t->id?>" title="<?=$lbl?>"><?="{$t->name} - {$t->cell}"?></option>
                <?php endforeach; ?>
              </select>           
            </p>
          </div>
          <div class="col" style="flex:1">
            <p class="field required" data-type="Select">
              <label>Station</label>
              <!-- data-multiple="true"  -->
              <select 
                name="stationid" 
                data-locale="en"
                data-search="true"
                data-placeholder="- Select a station -">
                <!-- <optgroup title="Main Group"> -->
                <?php foreach( $cal->stations as $s ): $lbl = "STATION {$s->no}<small> - {$s->name}</small>"; ?>
                <option value="<?=$s->id?>" title="<?=$lbl?>"><?="STATION {$s->no} - {$s->name}"?></option>
                <?php endforeach; ?>
                <!-- </optgroup> -->
              </select>
            </p>
          </div>
        </div>
        <div class="row" style="gap:1rem;margin-top:1rem">
          <div class="col" style="flex:1.34">
            <p class="field required" data-type="Calendar">
              <label>Date</label>
              <input type="text" name="date">
            </p>
            <p class="field required">
              <label>Time</label>
              <input type="text" name="time">
            </p>
            <p class="field required">
              <label>Duration</label>
              <input type="text" name="duration">
            </p>
          </div>
          <div class="col" style="flex:1">
            <span id="calendar"></span>
          </div>
        </div>
      </main>
      <hr>
      <footer>
        <button type="button" class="button" onclick="F1.bookingForm.submit(event)">Submit</button>
      </footer>
    </form>
  </div>
</div>