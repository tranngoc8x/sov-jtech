<div class="row-fluid footbar">
    <div class="span6 info">
        <div class="dataTables_info" id="datatable1_info">
            <?php
                echo $this->Paginator->counter(array(
                'format' => __('Trang {:page} / {:pages}, đang xem {:current} / {:count} bản ghi, bắt đầu từ bản ghi số {:start} đến {:end}.')
                ));
                ?>  
        </div>
    </div>
    <div class="span6 paging">
        <div class="dataTables_paginate paging_bootstrap pagination">
            <ul>                    
            <?php
            	//laquo
                // $this->Paginator->options(array('url' => array_merge($this->passedArgs,
                //                             array('?' => ltrim(strstr($_SERVER['QUERY_STRING'], '&'), '&')))
                //                         ));
                
                echo $this->Paginator->first( __('«'), array('tag'=>'li'), null, array('class' => 'first disabled','tag'=>'li'));
                echo $this->Paginator->prev( __('<'), array('tag'=>'li'), null, array('class' => 'prev disabled','tag'=>'li'));
                echo $this->Paginator->numbers(array('separator' => '','tag'=>'li',"modulus" => 4,'first' => 1, 'last' => 1,"ellipsis"=>"<li><a>...</a></li>"));
                echo $this->Paginator->next(__('>'), array('tag'=>'li'), null, array('class' => 'next disabled','tag'=>'li'));
                echo $this->Paginator->last(__('»'), array('tag'=>'li'), null, array('class' => 'last disabled','tag'=>'li'));
            ?>
             </ul>
        </div>
    </div>
</div>