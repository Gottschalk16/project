import React from 'react';

export interface ObjUsuario {
  id: number,
  nome: string,
  senha: string,
}

export interface iUsuario {
  state:{
    usuarios: ObjUsuario[]
  },
  dispatch: React.Dispatch<{ payload: ObjUsuario[]; type: string;}>
}
