<tr>
    <td class="hidden-xs">{dem}</td>
    <td class="hidden-xs">{loai_tour}</td>
    <td class="hidden-xs"><a target="_blank" href="{link}"><img src="{img}" style="width: 50px"></a></td>
    <td class="hidden-xs"><a target="_blank" href="{link}">{code}</a></td>
    <td><a target="_blank" href="{link}">{name}</a></td>
    <td>{price_format}</td>
    <td>{price_tiep_thi}</td>
    <td>
        <input style="position: absolute; left: 0px; z-index: -111" class="input_link" id="value_key_{id}" countid="{id}" type="text" value="{link_tiep_thi}">
        <a href="javascript:void(0);" countid="{id}" rel="tooltip" data-original-title="Copy link tiếp thị" class="btn btn-primary copy_link_list"><i class="fa fa-link"></i> Copy Link</a>
        <a target="_blank" rel="tooltip" data-original-title="Chia sẻ Facebook"
           href="https://www.facebook.com/sharer/sharer.php?u={link_tiep_thi}"
           style="margin-right: 5px;     padding: 10px 15px;   background-color: #337ab7;border-color: #2e6da4;" class="btn btn-primary"><i style="background:none" class="fa fa-facebook"></i></a>
        <a target="_blank" rel="tooltip" data-original-title="Chia sẻ Twitter"
           href="https://twitter.com/intent/tweet?source=webclient&text={link_tiep_thi}+{name}"
           style="margin-right: 5px;" class="btn btn-info"><i style="background:none" class="fa fa-twitter"></i></a>
        <a target="_blank" rel="tooltip" data-original-title="Chia sẻ Google"
           href="https://plus.google.com/share?url={link_tiep_thi}"
           style="margin-right: 5px;" class="btn btn-danger"><i style="background:none"
                                                                class="fa fa-google-plus"></i></a>
        <a target="_blank" rel="tooltip" data-original-title="Chia sẻ mail"
           href="mailto:?Subject={title}&body={description}%0D%0A%0D%0A{link_tiep_thi}"
           class="btn btn-warning"><i style="background:none" class="fa fa-envelope"></i></a>
    </td>
</tr>
