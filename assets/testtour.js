const TournamentOrganizer = require('tournament-organizer');

const manager = new TournamentOrganizer.EventManager();

const tourney = manager.createTournament(null, {
    name: 'My Example Tournament',
    format: 'swiss',
    playoffs: 'elim',
    cutLimit: 8,
    cutType: 'rank',
    bestOf: 3,
    winValue: 3,
    drawValue: 1,
    numberOfRounds: 4,
    tiebreakers: ['pokemon-tcg']
});

tourney.addPlayer('Gabu');
tourney.addPlayer('Electhor');
tourney.addPlayer('Radium');
tourney.addPlayer('Glum');
tourney.addPlayer('Alekso');
tourney.addPlayer('Taki');
tourney.addPlayer('Dworlax');
tourney.addPlayer('Mirlo');
tourney.addPlayer('Ichi');
tourney.addPlayer('Appy');
tourney.addPlayer('Hurta');
tourney.addPlayer('Nicolas');
tourney.addPlayer('Megathorn');
tourney.addPlayer('Patate');
tourney.addPlayer('Cyko');
tourney.addPlayer('Wabane');

tourney.startEvent();
const currentRound = 0;

const active = tourney.activeMatches();

tourney.result(active[0], 2, 1);
tourney.result(active[1], 0, 2);
tourney.result(active[2], 1, 2);
tourney.result(active[3], 2, 0);
tourney.result(active[4], 2, 1);
tourney.result(active[5], 0, 2);
tourney.result(active[6], 1, 2);
tourney.result(active[7], 2, 0);

const standings = tourney.standings();

console.log(active);

console.log("---------------------------");

console.log(standings);



tourney.result(active[0], 2, 1);
tourney.result(active[1], 0, 2);
tourney.result(active[2], 1, 2);
tourney.result(active[3], 2, 0);
tourney.result(active[4], 2, 1);
tourney.result(active[5], 0, 2);
tourney.result(active[6], 1, 2);
tourney.result(active[7], 2, 0);

console.log(active);

console.log("---------------------------");

console.log(standings);



tourney.result(active[0], 2, 1);
tourney.result(active[1], 0, 2);
tourney.result(active[2], 1, 2);
tourney.result(active[3], 2, 0);
tourney.result(active[4], 2, 1);
tourney.result(active[5], 0, 2);
tourney.result(active[6], 1, 2);
tourney.result(active[7], 2, 0);

console.log(active);

console.log("---------------------------");

console.log(standings);



tourney.result(active[0], 2, 1);
tourney.result(active[1], 0, 2);
tourney.result(active[2], 1, 2);
tourney.result(active[3], 2, 0);
tourney.result(active[4], 2, 1);
tourney.result(active[5], 0, 2);
tourney.result(active[6], 1, 2);
tourney.result(active[7], 2, 0);

console.log(active);

console.log("---------------------------");

console.log(standings);