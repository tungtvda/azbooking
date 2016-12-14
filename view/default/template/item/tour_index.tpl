<div class="trip-item">
    <div class="item-media">
        <div class="image-cover"><img title="{name}" src="{img}" alt="{name}"></div>
        <div {show_sales} class="trip-icon"><img src="{SITE-NAME}/view/default/themes/images/sale.png" alt=""></div>
    </div>
    <div class="item-body">
        <div class="item-title"><h2><a href="{link}">{name}</a></h2></div>
        <div class="item-list">
            <ul>
                <li {show_code}>{code}</li>
                <li>
                    <span class="from">{departure} <i class="awe-icon fa fa-long-arrow-right"></i></span>
                    <span class="to"> {destination}</span></li>
                <li>{durations}</li>
            </ul>
        </div>
        <div class="item-footer">

            <!--<div class="item-icon"><i class="awe-icon awe-icon-gym"></i>
                <i class="awe-icon awe-icon-car"></i> <i
                        class="awe-icon awe-icon-food"></i> <i
                        class="awe-icon awe-icon-level"></i> <i
                        class="awe-icon awe-icon-wifi"></i></div>-->
        </div>
    </div>
    <div class="item-price-more">
        <div class="price">
            <ins><span class="amount">{price_format}</span></ins>
            <del><span class="amount">{price_sales}</span></del>
        </div>
        <a href="{link}#booking" class="awe-btn">Đặt tour</a></div>
</div>