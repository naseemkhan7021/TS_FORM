SELECT * FROM matches where id = 102;
-- 870655
SELECT * FROM player_registration WHERE player_name LIKE  '%bh%'  ;

SELECT * FROM fantasy_user_create_team  WHERE match_id IN ( SELECT unique_id FROM matches WHERE ID = 102 ) order by user_id desc;

SELECT * FROM fantasy_team_players WHERE match_id = 870655 and  is_squad = 1;

SELECT * FROM fantasy_team_players WHERE match_id = 870655 and  is_squad = 1 and player_id in  ( "526431","109568","363755","146158","926657","464339","665921","455336","85948","315578","22358" );

SELECT * FROM fantasy_team_players WHERE match_id = 870655 and  is_squad = 1 and player_id not in ( "526431","109568","363755","146158","926657","464339","665921","455336","85948","315578","22358" ) ORDER BY player_id;

