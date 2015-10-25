@extends('master')
    @section('form')
        			<form class="form-horizontal" action = "getPrintList" method = "post">
        			
         			    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
   
        				<div class="control-group">
        					<label class="control-label" for="key_longti">学校</label>
        					<div class="controls">
        						<input name="schoolname" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="key_longti">页数</label>
        					<div class="controls">
        						<input name="page" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<label class="control-label" for="key_longti">每页包含条数</label>
        					<div class="controls">
        						<input name="count" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<div class="controls">
        						<label class="checkbox"><input type="checkbox" /> Remember me</label>
        					    <button class="btn" type="submit">查询</button>
        					</div>
        				</div>
        			</form>
    @stop    