import React from "react";

export interface ObjProduto {
  id: number,
  nome: string,
  quantidade: number,
  preco: number
}

export interface iProduto {
  state: {
    produtos: ObjProduto[]
  }
  dispatch: React.Dispatch<{ payload: ObjProduto[]; type: string;}>
}
