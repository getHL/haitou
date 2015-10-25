@extends('master')
    @section('form')
        			<form class="form-horizontal" action = "pay" method = "post">
        			
         			    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
   
        				<div class="control-group">
        					<label class="control-label" for="key_longti">打印店ID</label>
        					<div class="controls">
        						<input name="id" type="text" />
        					</div>
        				</div>
        				<div class="control-group">
        					<div class="controls">
        						<label class="checkbox"><input type="checkbox" /> Remember me</label>
        					    <button class="btn" type="submit">付款</button>
        					</div>
        				</div>
        			</form>
    @stop