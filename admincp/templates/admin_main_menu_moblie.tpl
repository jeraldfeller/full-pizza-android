<div class="menuCont " >
	<ul class="menu" id="mobile_menu">
        {if $smarty.session.adminid eq '1'}
            {section name="menulist" loop=$mainModulesList}
                {if $mainModulesList[menulist].id neq '13'}
                {if $mainModulesList[menulist].menucount gt 0}
                    {assign var = modulesList value = $objAdmin->selectSubMenu($mainModulesList[menulist].id)}
                {/if}
                <li><a {if $modulesList.0.modulesname neq ''} {section name="sub" loop=$modulesList} {if $req_file_name eq $modulesList[sub].page_url } class="active" {/if}{/section} {/if}  href="{if $mainModulesList[menulist].page_url neq ''}{$mainModulesList[menulist].page_url}{else}javascript:void(0){/if}">{$mainModulesList[menulist].modulesname|ucfirst|stripslashes} {if $mainModulesList[menulist].menucount gt 0}<i class="fa fa-chevron-down pull-right"></i>{/if}</a>
                
                                
                    {if $mainModulesList[menulist].menucount gt 0}
                    
                    <ul>
                        {section name="sub" loop=$modulesList}
                             <li><a class="innerLinks  col-sm-3" href="{if $modulesList[sub].page_url neq ''}{$modulesList[sub].page_url}{else}javascript:void(0);{/if}">{$modulesList[sub].modulesname|ucfirst|stripslashes}</a></li>
                        {/section}
                    </ul>
                    {/if}
                </li>
                {/if}
            {/section}
        {else}
            {section name="menulist" loop=$mainModulesList}
                {section name="userlist" loop=$userModulesList}
                    {if $userModulesList[userlist].modules eq $mainModulesList[menulist].id}
                        {if $mainModulesList[menulist].id neq '13'}
                        <li><a href="{if $mainModulesList[menulist].page_url neq ''}{$mainModulesList[menulist].page_url}{else}javascript:void(0){/if}">{$mainModulesList[menulist].modulesname|ucfirst|stripslashes}</a>                        
                            {if $mainModulesList[menulist].menucount gt 0}
                                {$objAdmin->selectSubMenu($mainModulesList[menulist].id)}
                                <ul>
                                    {section name="sub" loop=$modulesList}
                                        {section name="usedlist" loop=$userUsedModulesList}
                                            {if $userUsedModulesList[usedlist].modules eq $modulesList[sub].id}
                                                <li><a href="{if $modulesList[sub].page_url neq ''}{$modulesList[sub].page_url}{else}javascript:void(0);{/if}">{$modulesList[sub].modulesname|ucfirst|stripslashes}</a></li>
                                            {/if}
                                        {/section}
                                    {/section}
                                </ul>
                            {/if}
                        </li>
                        {/if}
                    {/if}
                {/section}
            {/section}
        {/if}
    </ul>  
</div>  


