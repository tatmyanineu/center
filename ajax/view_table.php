<?php
/**
 * Created by PhpStorm.
 * User: Евгений
 * Date: 21.06.2018
 * Time: 11:22
 */
include '../include/db_config.php';
session_status();
$sql = pg_query('SELECT 
  public.alarm.id,
  public.alarm.r_addr,
  to_char(public.alarm."aDate", \'DD.MM.YYYY HH24:MI\') AS "aDate",
  public.alarm."aName",
  public.alarm."aPhone",
  public.alarm.callback,
  public.problem.text as problem,
  public."Location_problem".text as location,
  public.alarm."aService",
  public.alarm."aServiceTicket",
  public.alarm."aAdderss",
  public.alarm."aWidth",
  public.alarm."aHeight",
  public.alarm."aUri"
FROM
  public.problem
  INNER JOIN public.alarm ON (public.problem.id = public.alarm."aDamage")
  INNER JOIN public."Location_problem" ON (public.alarm."aLocation" = public."Location_problem".id)');

$array['data']= pg_fetch_all($sql);

echo json_encode($array, JSON_UNESCAPED_UNICODE);