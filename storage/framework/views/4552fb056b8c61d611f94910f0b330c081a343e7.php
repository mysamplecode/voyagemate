

<?php $__env->startSection('main'); ?>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <div class="ex-image-container" onclick="lightbox(0)" style="background-image:url(<?php echo e($result->cover_photo); ?>);">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="">
      <div class="col-md-8 col-sm-12 margin-top20">
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <div class="media-photo-badge text-center">
              <a href="<?php echo e(url('users/show/'.@$result->host_id)); ?>" ><img alt="User Profile Image" class="profile-img-thumb" src="<?php echo e($result->users->profile_src); ?>" title="<?php echo e($result->users->first_name); ?>"></a>
              <div href="" class="h6"><?php echo e(@$result->users->first_name); ?></div>
            </div>
          </div>
          <div class="col-md-9 col-sm-9">
            <div class="col-md-12">
              <h1 itemprop="name" class="h3">
              <?php echo e($result->name); ?>

              </h1>
            </div>
            <div class="col-md-12">
              <div class="col-md-7 r-pad-none">
                <div class="h6">
                  <a href="" class=""><?php echo e($result->property_address->city); ?> <?php if($result->property_address->city !=''): ?>,<?php endif; ?> <?php echo e($result->property_address->state); ?> <?php if($result->property_address->state !=''): ?>,<?php endif; ?> <?php echo e($result->property_address->countries->name); ?></a>
                  &nbsp;
                </div>
              </div>          
              <?php if($result->overall_rating): ?>
              <div class="col-md-5 r-pad-none">
                <div style="float:left;">
                  <ul class="star-rating-alt">
                    <li class="current-rating" style="width: <?php echo $result->overall_rating; ?>px"></li>
                  </ul>
                </div>
                <div class="margin-top10" style="font-size:18px;float:left;">
                  (<?php echo e($result->reviews->count()); ?>)
                </div>
              </div>
              <div class="clearfix"></div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-9 margin-top20">
            <div class="row row-condensed text-muted text-center">
              <div class="col-sm-3">
                <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                <div><?php echo e($result->space_type_name); ?></div>
              </div>
              <div class="col-sm-3">
                <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                <div> <?php echo e($result->accommodates); ?> <?php echo e(trans('messages.property_single.guest')); ?> </div>
              </div>
              <div class="col-sm-3">
                <i class="fa fa-bed fa-2x" aria-hidden="true"></i>
                <div><?php echo e($result->beds); ?> <?php echo e(trans('messages.property_single.bed')); ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!--end-->
      <div class="col-md-4 col-sm-12">
        <div id="sticky-anchor"></div>
        <div id="booking-banner" class="banner-bar">
          <div class="banner-bar-bg">
            <div class="col-lg-12">
              <div class="white_color pull-left h4"><?php echo e($result->property_price->currency->symbol); ?> <span  id="rooms_price_amount" value=""><?php echo e($result->property_price->price); ?></span></div>
              <div class="white_color pull-right h6">
                <div id="per_night" class="per-night">
                  <?php echo e(trans('messages.property_single.per_night')); ?>

                </div>
                <div id="per_month" class="per-month display-off">
                  <?php echo e(trans('messages.property_single.per_month')); ?>

                  <i id="price-info-tooltip" class="icon icon-question hide" data-behavior="tooltip"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="booking-price" class="panel panel-default">
          <div class="margin-top10">
            <form accept-charset="UTF-8" method="post" action="<?php echo e(url('payments/book/'.$property_id)); ?>">
              <div class="col-md-4 col-sm-4 r-pad-none">
                <label><?php echo e(trans('messages.property_single.check_in')); ?></label>
                <div class="">
                  <input class="form-control" id="list_checkin" name="checkin" value="<?php echo e($checkin); ?>" placeholder="dd-mm-yyyy" type="text" required>
                </div>
              </div>
              <input type="hidden" id="property_id" value="<?php echo e($property_id); ?>">
              <input type="hidden" id="room_blocked_dates" value="" >
              <input type="hidden" id="calendar_available_price" value="" >
              <input type="hidden" id="room_available_price" value="" >
              <input type="hidden" id="price_tooltip" value="" >
              <input type="hidden" id="url_checkin" value="<?php echo e($checkin); ?>" >
              <input type="hidden" id="url_checkout" value="<?php echo e($checkout); ?>" >
              <input type="hidden" id="url_guests" value="<?php echo e($guests); ?>" >
              <input type="hidden" name="booking_type" id="booking_type" value="<?php echo e($result->booking_type); ?>" >

              <div class="col-md-4 col-sm-4 r-pad-none">
                <label><?php echo e(trans('messages.property_single.check_out')); ?></label>
                <div class="">
                  <input class="form-control" id="list_checkout" name="checkout" value="<?php echo e($checkout); ?>" placeholder="dd-mm-yyyy" type="text" required>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <label><?php echo e(trans('messages.property_single.guest')); ?></label>
                <div class="">
                  <select id="number_of_guests" class="form-control" name="number_of_guests">
                    <?php for($i=1;$i<= $result->accommodates;$i++): ?>
                      <option value="<?php echo e($i); ?>" <?= $guests == $i?'selected':''?>><?php echo e($i); ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
              <div id="book_it">
                <div class="js-subtotal-container booking-subtotal panel-padding-fit" style="padding:0px 12px; display:none;">
                  <div id="loader" class="display-off" style="min-height:200px;width:100%;text-align:center;opacity:0.9;padding-top: 110px;">
                    <img src="<?php echo e(URL::to('/')); ?>/public/front/img/green-loader.gif">
                  </div>
                  <table class="table table-bordered price_table" >
                    <tbody>
                      <tr>
                        <td>
                          <?php echo e($result->property_price->currency->symbol); ?>  <span  id="rooms_price_amount_1" value=""><?php echo e($result->property_price->price); ?></span> x <span  id="total_night_count" value="">0</span> <?php echo e(trans('messages.property_single.night')); ?>

                        </td>
                        <td><?php echo e($result->property_price->currency->symbol); ?><span  id="total_night_price" value="">0</span></td>
                      </tr>
                      <tr>
                        <td>
                          <?php echo e(trans('messages.property_single.service_fee')); ?>

                          <i id="service-fee-tooltip" class="icon icon-question"></i>
                        </td>
                        <td><?php echo e($result->property_price->currency->symbol); ?><span  id="service_fee" value="">0</span></td>
                      </tr>
                      <tr class = "additional_price"> 
                        <td>
                          <?php echo e(trans('messages.property_single.additional_guest_fee')); ?>

                        </td>
                        <td><?php echo e($result->property_price->currency->symbol); ?><span  id="additional_guest" value="">0</span></td>
                      </tr>
                      <tr class = "security_price"> 
                        <td>
                          <?php echo e(trans('messages.property_single.security_fee')); ?>

                        </td>
                        <td><?php echo e($result->property_price->currency->symbol); ?><span  id="security_fee" value="">0</span></td>
                      </tr>
                      <tr class = "cleaning_price"> 
                        <td>
                          <?php echo e(trans('messages.property_single.cleaning_fee')); ?>

                        </td>
                        <td><?php echo e($result->property_price->currency->symbol); ?><span  id="cleaning_fee" value="">0</span></td>
                      </tr>
                      <tr>
                        <td><?php echo e(trans('messages.property_single.total')); ?></td>
                        <td><?php echo e($result->property_price->currency->symbol); ?><span  id="total" value="">0</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div id="book_it_disabled" class="text-center" style="display:none;">
                  <p id="book_it_disabled_message" class="icon-rausch">
                    <?php echo e(trans('messages.property_single.date_not_available')); ?>

                  </p>
                  <a href="<?php echo e(URL::to('/')); ?>/search?location=<?php echo e($result->property_address->city); ?>" class="btn btn-large btn-block" id="view_other_listings_button">
                    <?php echo e(trans('messages.property_single.view_other_list')); ?>

                  </a>
                </div>
                <div class="book_btn col-md-12 mb20 <?php echo e(($result->host_id == @Auth::guard('users')->user()->id) ? 'display-off' : ''); ?>">
                  <button type="submit" class="col-md-12 col-sm-12 col-xs-12 btn ex-btn">
                    <span class="<?php echo e(($result->booking_type != 'instant') ? '' : 'display-off'); ?>">
                      <?php echo e(trans('messages.property_single.request_book')); ?>

                    </span>
                    <span class="<?php echo e(($result->booking_type == 'instant') ? '' : 'display-off'); ?>">
                      <i class="icon icon-bolt text-beach h4"></i>
                      <?php echo e(trans('messages.property_single.instant_book')); ?>

                    </span>
                  </button>
                </div> 
                <p class="col-md-12 text-center"><?php echo e(trans('messages.property_single.review_of_pay')); ?></p>  
              </div>
              <input id="hosting_id" name="hosting_id" type="hidden" value="<?php echo e($result->id); ?>">
            </form>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <hr>
    <div class="clearfix"></div> 
    <div class="col-md-8">
      <h3 class="margin-top60"><strong><?php echo e(trans('messages.property_single.about_list')); ?></strong> </h3>
      <h5 class="margin-top20"><?php echo e($result->property_description->summary); ?></h5>
      

      <div class="margin-top30">
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <div class="text-muted">
              <?php echo e(trans('messages.property_single.the_space')); ?>

            </div>
          </div>
          <div class="col-md-9 col-sm-9">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                  <?php if(@$result->bed_types->name != NULL): ?>
                    <div><?php echo e(trans('messages.property_single.bed_type')); ?>: <strong><?php echo e(@$result->bed_types->name); ?></strong></div>
                  <?php endif; ?>
                  <div><?php echo e(trans('messages.property_single.property_type')); ?>: <strong><a href="#" class="link-reset"><?php echo e($result->property_type_name); ?></a></strong></div>
                  <div><?php echo e(trans('messages.property_single.accommodate')); ?>: <strong><?php echo e($result->accommodates); ?></strong></div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div><?php echo e(trans('messages.property_single.bedroom')); ?>: <strong><?php echo e($result->bedrooms); ?></strong></div>

                <div><?php echo e(trans('messages.property_single.bathroom')); ?>: <strong><?php echo e($result->bathrooms); ?></strong></div>

                <div><?php echo e(trans('messages.property_single.bed')); ?>: <strong><?php echo e($result->beds); ?></strong></div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <div class="text-muted">
              <?php echo e(trans('messages.property_single.amenity')); ?>

            </div>
          </div>
          <div class="col-md-9 col-sm-9">
            <div class="row">
              <?php  $i = 1  ?>

              <?php  $count = round(count($amenities)/2)  ?>

              <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_amenities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($i < 6): ?>
                  <div class="col-md-6 col-sm-6">
                    <div>
                      <i class="icon h3 icon-<?php echo e($all_amenities->symbol); ?>" aria-hidden="true"></i> 
                      <?php if($all_amenities->status == null): ?>
                        <del> 
                      <?php endif; ?>
                      <?php echo e($all_amenities->title); ?>

                      <?php if($all_amenities->status == null): ?>
                        </del> 
                      <?php endif; ?>
                    </div> 
                  </div>
                  <?php  $i++  ?>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-6 col-sm-6" id="amenities_trigger">
                <a href="javascript:void(0)" data-rel="amenities" class="more-btn"><strong>+ <?php echo e(trans('messages.property_single.more')); ?></strong></a>
              </div>
              <div class="display-off" id="amenities_after">
                <?php  $i = 1  ?>
                <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_amenities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($i > 6): ?>
                    <div class="col-md-6 col-sm-6">
                      <div>
                        <i class="icon h3 icon-<?php echo e($all_amenities->symbol); ?>" aria-hidden="true"></i> 
                        <?php if($all_amenities->status == null): ?>
                          <del> 
                        <?php endif; ?>
                        <?php echo e($all_amenities->title); ?>

                        <?php if($all_amenities->status == null): ?>
                          </del> 
                        <?php endif; ?>
                      </div> 
                    </div>
                  <?php endif; ?>
                  <?php  $i++  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>  
        <hr>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <div class="text-muted">
              <?php echo e(trans('messages.property_single.price')); ?>

            </div>
          </div>
          <div class="col-md-9 col-sm-9">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div><?php echo e(trans('messages.property_single.extra_people')); ?>:
                <strong> 
                <?php if($result->property_price->guests !=0): ?>                
                  <span> <?php echo e($result->property_price->currency->symbol); ?> <?php echo e($result->property_price->guest_fee); ?> / <?php echo e(trans('messages.property_single.after_night')); ?> <?php echo e($result->property_price->guest_after); ?> <?php echo e(trans('messages.property_single.guests')); ?></span>
                <?php else: ?>
                  <span ><?php echo e(trans('messages.property_single.no_charge')); ?></span>
                <?php endif; ?>
                </strong>
                </div>
                <div><?php echo e(trans('messages.property_single.weekly_price')); ?>: 
                <?php if($result->property_price->weekly_discount != 0): ?>
                <strong> <span id="weekly_price_string"><?php echo e($result->property_price->currency->symbol); ?> <?php echo e($result->property_price->weekly_discount); ?></span> /<?php echo e(trans('messages.property_single.week')); ?></strong>
                <?php else: ?>
                <strong><span id="weekly_price_string"><?php echo e($result->property_price->currency->symbol); ?> <?php echo e(number_format($result->property_price->price * 7)); ?></span> /<?php echo e(trans('messages.property_single.week')); ?></strong>
                
                <?php endif; ?>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div>
                  <?php echo e(trans('messages.property_single.monthly_price')); ?>:
                  <?php if($result->property_price->monthly_discount != 0): ?>
                  <strong> 
                    <span id="weekly_price_string"><?php echo e($result->property_price->currency->symbol); ?> <?php echo e($result->property_price->monthly_discount); ?></span> /<?php echo e(trans('messages.property_single.month')); ?>

                  </strong>
                  <?php else: ?>
                  <strong><span id="weekly_price_string"><?php echo e($result->property_price->currency->symbol); ?> <?php echo e(number_format($result->property_price->price * 30)); ?></span> /<?php echo e(trans('messages.property_single.month')); ?></strong>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if($result->property_description->about_place !='' || $result->property_description->place_is_great_for !='' || $result->property_description->guest_can_access !='' || $result->property_description->interaction_guests !='' || $result->property_description->other || $result->property_description->about_neighborhood || $result->property_description->get_around): ?> 
        <hr>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <div class="text-muted">
              <?php echo e(trans('messages.property_single.description')); ?>

            </div>
          </div>
          <div class="col-md-9 col-sm-9">
            <?php if($result->property_description->about_place): ?>
            <strong><?php echo e(trans('messages.property_single.about_place')); ?></strong>
            <p><?php echo e($result->property_description->about_place); ?></p>
            <?php endif; ?>
            <?php if($result->property_description->place_is_great_for): ?>
            <strong><?php echo e(trans('messages.property_single.place_great_for')); ?></strong>
            <p><?php echo e($result->property_description->place_is_great_for); ?> </p>
            <?php endif; ?>
            <a href="javascript:void(0)" id="description_trigger" data-rel="description" class="more-btn"><strong>+ <?php echo e(trans('messages.property_single.more')); ?></strong></a>
            <div class="display-off" id='description_after'>
              <?php if($result->property_description->interaction_guests): ?>
              <strong><?php echo e(trans('messages.property_single.interaction_guest')); ?></strong>
              <p> <?php echo e($result->property_description->interaction_guests); ?></p>
              <?php endif; ?>
              <?php if($result->property_description->about_neighborhood): ?>
              <strong><?php echo e(trans('messages.property_single.about_neighborhood')); ?></strong>
              <p> <?php echo e($result->property_description->about_neighborhood); ?></p>
              <?php endif; ?>
              <?php if($result->property_description->guest_can_access): ?>
              <strong><?php echo e(trans('messages.property_single.guest_access')); ?></strong>
              <p><?php echo e($result->property_description->guest_can_access); ?></p>
              <?php endif; ?>
              <?php if($result->property_description->get_around): ?>
              <strong><?php echo e(trans('messages.property_single.get_around')); ?></strong>
              <p><?php echo e($result->property_description->get_around); ?></p>
              <?php endif; ?>
              <?php if($result->property_description->other): ?>
              <strong><?php echo e(trans('messages.property_single.other')); ?></strong>
              <p><?php echo e($result->property_description->other); ?></p>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if(count($safety_amenities) !=0): ?>
        <hr>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <div class="text-muted">
              <?php echo e(trans('messages.property_single.safety_feature')); ?>

            </div>
          </div>
          <div class="col-md-9 col-sm-9">
            <div class="row">
              <?php $__currentLoopData = $safety_amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_safety): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-6 col-sm-6">
                <i class="icon h3 icon-<?php echo e($all_amenities->symbol); ?>" aria-hidden="true"></i> 
                <?php if($row_safety->status == null): ?>
                  <del> 
                <?php endif; ?>
                  <?php echo e($row_safety->title); ?>

                <?php if($row_safety->status == null): ?>
                  </del> 
                <?php endif; ?>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <hr>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <div class="text-muted">
              <?php echo e(trans('messages.property_single.avialability')); ?>

            </div>
          </div>
          <div class="col-md-9 col-sm-9">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                  <div>1 <?php echo e(trans('messages.property_single.night')); ?></div>
              </div>
              <div class="col-md-6 col-sm-6">
                <a id="view-calendar" href="javascript:void(0)"><strong><?php echo e(trans('messages.property_single.view_calendar')); ?></strong></a>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <!--popup slider-->
        <div style="display:none;">
          <div id="ninja-slider">
            <div class="slider-inner">
              <ul>
                <?php $__currentLoopData = $property_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_photos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                      <a class="ns-img" href="<?php echo e(url('public/images/property/'.$property_id.'/'.$row_photos->photo)); ?>"></a>
                      <!--<div class="caption">
                          <h3>Dummy Caption 1</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus accumsan purus.</p>
                      </div>-->
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <div id="fsBtn" class="fs-icon" title="Expand/Close"></div>
            </div>
          </div>
        </div>
        <!--popup slider end-->
        <?php if(count($property_photos) > 0): ?>
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="row">
              <?php  $i=0  ?>
              <?php $__currentLoopData = $property_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_photos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($i == 0): ?>
                <div class="col-md-12 col-sm-12" style="margin-bottom:10px;">
                  <img style="height:400px; width:100%; background-size: cover; background-position: 50% 50%;" src="<?php echo e(url('public/images/property/'.$property_id.'/'.$row_photos->photo)); ?>" style="height:100px;" onclick="lightbox(<?php echo e($i); ?>)" />
                </div>
                <?php elseif($i < 4): ?>
                <div class="col-md-3 col-sm-3">
                  <img src="<?php echo e(url('public/images/property/'.$property_id.'/'.$row_photos->photo)); ?>" style="width:100%;height:130px;" onclick="lightbox(<?php echo e($i); ?>)" />
                </div>
                <?php else: ?>
                  <?php  break;  ?>
                <?php endif; ?>
                  <?php  $i++  ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-3 col-sm-3">
                  <h3 onclick="lightbox(0)" style="text-align: center;padding-top: 40px; margin-top:0px; color:white; height:130px; width:100%; background-color: #8E8F90;">View All</h3>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <?php endif; ?>
      </div>
      
      <div class="clearfix"></div>
      <div class="h4 margin-top40"><strong><?php echo e(trans('messages.property_single.about_host')); ?>, <?php echo e($result->users->first_name); ?></strong></div> 
      <div class="row margin-top20">
        <div class="col-md-3 text-center">
            <div class="media-photo-badge text-center">
               <a href="<?php echo e(url('users/show/'.$result->host_id)); ?>" ><img alt="<?php echo e($result->users->first_name); ?>" class="" src="<?php echo e($result->users->profile_src); ?>" title="<?php echo e($result->users->first_name); ?>"></a>
            </div>
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-6">
                <!--<?php if(@$result->users->live): ?>
                  <div>
                    <?php echo e(@$result->users->live); ?>

                  </div>
                <?php endif; ?>-->
                Member since <?php echo e(date('F Y', strtotime($result->users->created_at))); ?>

            
            </div>  
          </div> 
        </div>
      </div> 
      <hr>
    </div>

    <div class="col-md-4"></div>
      
    <div class="row mb25">
      <div id="room-detail-map" style="width:100%; height:600px;"></div>
    </div>
    <?php if(count($similar)!= 0): ?>
    <div class="row margin-top20 col-xs-12 mb30">
      <h4 class="row-space-4 text-center-sm mb50"><?php echo e(trans('messages.property_single.similar_list')); ?></h4>
      <?php $__currentLoopData = $similar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row_similar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 col-sm-4 col-xs-12 mb10">
          <div class="similar-room-div">
            <a href="<?php echo e(url('properties/'.$row_similar->id)); ?>" class="similar-room">
              <img src="<?php echo e(url($row_similar->cover_photo)); ?>" alt="">
            </a>
          </div>
          <div>
            <div class="media-left">
               <div class="media-user">
                 <div class="doller-sign-bg"><?php echo e(@$row_similar->property_price->currency->symbol); ?> <?php echo e(@$row_similar->property_price->price); ?></div>
              </div>
            </div>
            <div class="media-user"> 
                <div class="media-user-img"><a href="<?php echo e(url('users/show/'.@$result->user_id)); ?>"><img src="<?php echo e(@$row_similar->users->profile_src); ?>" alt="" width="100%"></a></div>
            </div>
            <div class="col-xs-12 mb20">
               <div class="location-title"><a href="<?php echo e(url('properties/'.$row_similar->id)); ?>"><?php echo e(@$row_similar->name); ?></a></div>
               <div class="text-muted"><?php echo e(@$row_similar->property_type_name); ?>  — <?php echo e(number_format(@$row_similar->distance,2)); ?> <?php echo e(trans('messages.property_single.kilometer_away')); ?></div>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
  </div> 
<?php $__env->startPush('scripts'); ?>
<script>
    $("#view-calendar").click(function() {
        return $("#list_checkin").trigger("select");
    })

    $(function() {
      $("#list_checkin").datepicker({
          dateFormat: "dd-mm-yy",
          minDate: 0,
          onSelect: function(e) {
              var t = $("#list_checkin").datepicker("getDate");
              t.setDate(t.getDate() + 1), $("#list_checkout").datepicker("setDate", t), $("#list_checkout").datepicker("option", "minDate", t), setTimeout(function() {
                  $("#list_checkout").datepicker("show")
              }, 20)
              price_calculation('', '', '');
          }
      }); 
    });

    $(function() {
      $("#list_checkout").datepicker({
          dateFormat: "dd-mm-yy",
          minDate: 1,
          onClose: function() {
              var e = $("#list_checkin").datepicker("getDate"),
                  t = $("#list_checkout").datepicker("getDate");
              if (e >= t) {
                  var a = $("#list_checkout").datepicker("option", "minDate");
                  $("#list_checkout").datepicker("setDate", a)
              }
          },onSelect: function(){
              price_calculation('', '', '');
          }
      });
    });
    function sticky_relocate() {
        var window_top = $(window).scrollTop();
        var div_top = $('#sticky-anchor').offset().top;
        if (window_top > div_top) {
            $('#booking-banner').addClass('stick');
            $('#booking-price').addClass('stick');
            $('#sticky-anchor').height($('#sticky').outerHeight());
        } else {
            $('#booking-banner').removeClass('stick');
            $('#booking-price').removeClass('stick');
            $('#sticky-anchor').height(0);
        }
        if(window_top > 2600){
          $('#booking-price').hide();
        }else{
          $('#booking-price').show();
        }
    }
    $(function(){
      var checkin     = $('#url_checkin').val();
      var checkout    = $('#url_checkout').val();
      var guest       = $('#url_guests').val();
      price_calculation(checkin, checkout, guest);
    });

    $('#number_of_guests').on('change', function(){
      /*var checkin     = $('#list_checkin').val();
      var checkout    = $('#list_checkout').val();
      var guest       = $('#number_of_guests').val();*/
      price_calculation('', '', '');
    });

    function price_calculation(checkin, checkout, guest){
      checkin = checkin != ''? checkin:$('#list_checkin').val();
      checkout = checkout != ''? checkout:$('#list_checkout').val();
      guest = guest != ''? guest:$('#number_of_guests').val();
      if(checkin != '' && checkout != '' &&  guest != ''){
        var property_id     = $('#property_id').val();
        var dataURL = '<?php echo e(url("property/get-price")); ?>';
        $.ajax({
            url: dataURL,
            data: {
              'checkin': checkin,
              'checkout': checkout,
              'guest_count': guest, 
              'property_id': property_id,
            },
            type: 'post',
            //async: false,
            dataType: 'json',
            beforeSend: function (){
              $('.price_table').hide();
              show_loader();
            },
            success: function (result) {
              if(result.status == 'Not available'){
                $('.book_btn').hide();
                $('.booking-subtotal').hide();
                $('#book_it_disabled').show();
              }else{
                $('.additional_price').show();
                $('.security_price').show();
                $('.cleaning_price').show()
                $("#total_night_count").html(result.total_nights);
                $('#total_night_price').html(result.total_night_price);
                $('#service_fee').html(result.service_fee);
                if(result.additional_guest != 0) $('#additional_guest').html(result.additional_guest);
                else $('.additional_price').hide();
                if(result.security_fee != 0) $('#security_fee').html(result.security_fee);
                else $('.security_price').hide();
                if(result.cleaning_fee != 0) $('#cleaning_fee').html(result.cleaning_fee);
                else $('.cleaning_price').hide();
                $('#total').html(result.total);
                //$('#total_night_price').html(result.total_night_price);

                $('.booking-subtotal').show();

                $('#book_it_disabled').hide();
                $('.book_btn').show();
              }

              var host = "<?php echo e(($result->host_id == @Auth::guard('users')->user()->id) ? '1' : ''); ?>";
              if(host == '1') $('.book_btn').hide();
            },
            error: function (request, error) {
              // This callback function will trigger on unsuccessful action
              console.log(error);
            },
            complete: function(){
              $('.price_table').show();
              hide_loader();
            }
        });
      }
    }

    $(function() {
        $(window).scroll(sticky_relocate);
        sticky_relocate();
    });


    $('.more-btn').on('click', function(){
      var name = $(this).attr('data-rel');
      $('#'+name+'_trigger').hide();
      $('#'+name+'_after').show();
    });

    $('#room-detail-map').locationpicker({
        location: {
            latitude: "<?php echo e($result->property_address->latitude); ?>",
            longitude: "<?php echo e($result->property_address->longitude); ?>"
        },
        radius: 0,
        addressFormat: "",
        markerVisible: false,
        markerInCenter: true,
        enableAutocomplete: true,
        scrollwheel: false,
        oninitialized: function (component) {
          setCircle($(component).locationpicker('map').map);
        }
    });

    function setCircle(map){
      var citymap = {
        loccenter: {
          center: {lat: 41.878, lng: -87.629},
          population: 240
        },
      };

      var cityCircle = new google.maps.Circle({
            strokeColor: '#329793',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#329793',
            fillOpacity: 0.35,
            map: map,
            center: {lat: <?php echo e($result->property_address->latitude); ?>, lng: <?php echo e($result->property_address->longitude); ?> },
            radius: citymap['loccenter'].population
      });
    }

    function lightbox(idx) {
        //show the slider's wrapper: this is required when the transitionType has been set to "slide" in the ninja-slider.js
        var ninjaSldr = document.getElementById("ninja-slider");
        ninjaSldr.parentNode.style.display = "block";

        nslider.init(idx);

        var fsBtn = document.getElementById("fsBtn");
        fsBtn.click();
    }

    function fsIconClick(isFullscreen) { //fsIconClick is the default event handler of the fullscreen button
        if (isFullscreen) {
            var ninjaSldr = document.getElementById("ninja-slider");
            ninjaSldr.parentNode.style.display = "none";
        }
    }

    function show_loader(){
      $('#loader').removeClass('display-off');
      $('#pagination').hide();
    }
    
    function hide_loader(){
      $('#loader').addClass('display-off');
      $('#pagination').show();
    }
</script>
<?php $__env->stopPush(); ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>